<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

date_default_timezone_set("Asia/Kathmandu");
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Start the session to access session variables
session_start();

// Check if the request method is POST and the check_availability parameter exists
if (isset($_POST['check_availability'])) {
    $frm_data = filtration($_POST);
    $status = "";
    $result = "";

    // Ensure that the provided dates are valid
    if (!isset($frm_data['check_in']) || !isset($frm_data['check_out'])) {
        $status = 'invalid_dates';
        $result = json_encode(array('status' => $status, 'message' => 'Invalid check-in or check-out dates.'));
        echo $result;
        exit;
    }

    // Convert the string dates into DateTime objects
    $today_date = new DateTime(date("Y-m-d"));
    $checkin_date = new DateTime($frm_data['check_in']);
    $checkout_date = new DateTime($frm_data['check_out']);

    // Check if check-in and check-out dates are the same
    if ($checkin_date == $checkout_date) {
        $status = 'check_in_equal';
        $result = json_encode(array('status' => $status, 'message' => 'Check-in and check-out dates cannot be the same.'));
        echo $result;
        exit;
    }
    // Check if check-out date is earlier than check-in date
    else if ($checkout_date < $checkin_date) {
        $status = 'check_out_earlier';
        $result = json_encode(array('status' => $status, 'message' => 'Check-out date cannot be earlier than check-in date.'));
        echo $result;
        exit;
    }
    // Check if check-in date is earlier than today’s date
    else if ($checkin_date < $today_date) {
        $status = 'check_in_earlier';
        $result = json_encode(array('status' => $status, 'message' => 'Check-in date cannot be earlier than today.'));
        echo $result;
        exit;
    }

    // If all date validations pass, check room availability
    if (isset($_SESSION['room']) && !empty($_SESSION['room'])) {
        // Calculate the number of days between check-in and check-out
        $count_days = $checkout_date->diff($checkin_date)->days;

        $room_price = $_SESSION['room']['price'];
        // Calculate payment amount
        $payment = $room_price * $count_days;

        // Store payment info in the session
        $_SESSION['room']['payment'] = $payment;
        $_SESSION['room']['available'] = true;
        $_SESSION['room']['price'] = $room_price;

        // Prepare the response
        $status = 'available';
        $result = json_encode(array('status' => $status, 'days' => $count_days, 'payment' => $payment, 'price_per_night' => $room_price));
    } else {
        // Room session not available
        $status = 'no_room_session';
        $result = json_encode(array('status' => $status, 'message' => 'Room session is not available.'));
    }

    // Return the result as JSON
    echo $result;
}

// Reserve now: Handling booking reservation
if (isset($_POST['reserve_now']) && $_POST['reserve_now'] == true) {
    // Retrieve form data from the POST request
    $user_name = mysqli_real_escape_string($con, $_POST['user_name']);
    $room_name = mysqli_real_escape_string($con, $_POST['room_name']);
    $phonenum = mysqli_real_escape_string($con, $_POST['phonenum']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $checkin = mysqli_real_escape_string($con, $_POST['checkin']);
    $checkout = mysqli_real_escape_string($con, $_POST['checkout']);
    $room_id = intval($_SESSION['room']['id']); // Room ID from session
    $room_price = $_SESSION['room']['price'];  // Room price from session

    // Check if user is logged in
    if (!isset($_SESSION['uId'])) {
        $response = array('status' => 'error', 'message' => 'You must be logged in to make a reservation.');
        echo json_encode($response);
        exit;
    }

    $user_id = $_SESSION['uId']; // User ID from session

    // Validate input fields
    if (empty($user_name) || empty($phonenum) || empty($address) || empty($checkin) || empty($checkout)) {
        $response = array('status' => 'error', 'message' => 'All fields are required.');
        echo json_encode($response);
        exit;
    }

    // Convert check-in and check-out dates to DateTime objects for validation
    $checkin_date = new DateTime($checkin);
    $checkout_date = new DateTime($checkout);
    $days_count = $checkout_date->diff($checkin_date)->days;

    // Validate check-in and check-out dates
    if ($days_count <= 0) {
        $response = array('status' => 'error', 'message' => 'Check-out date must be later than check-in date.');
        echo json_encode($response);
        exit;
    }

    // Step 1: Check if the room is already reserved during the selected dates
    $query = "SELECT * FROM `bookings` 
              WHERE `room_id` = ? 
              AND (
                  (`check_in` BETWEEN ? AND ?) 
                  OR 
                  (`check_out` BETWEEN ? AND ?) 
                  OR
                  (? BETWEEN `check_in` AND `check_out`)
              ) AND `status` = 'reserved'";

    // Prepare and execute the query to check for overlapping reservations
    $stmt = $con->prepare($query);
    $stmt->bind_param('isssss', $room_id, $checkin, $checkout, $checkin, $checkout, $checkin);
    $stmt->execute();
    $result_check = $stmt->get_result();

    if ($result_check->num_rows > 0) {
        // If there's an existing booking that overlaps, return an error
        $response = array('status' => 'error', 'message' => 'The room is already reserved for the selected dates.');
        echo json_encode($response);
        exit;
    }

    // Step 2: Calculate payment (total cost for the days booked)
    $payment = $room_price * $days_count;

    // Step 3: Insert the booking details into the database
    $booking_query = "INSERT INTO `bookings` 
    (`user_name`, `room_name`, `user_id`, `room_id`, `check_in`, `check_out`, `address`, `phone_number`, `status`, `price`, `created_at`) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, 'reserved', ?, NOW())";

    // Prepare and execute the SQL statement
    if ($stmt = $con->prepare($booking_query)) {
        $stmt->bind_param("ssisssssd", $user_name, $room_name, $user_id, $room_id, $checkin, $checkout, $address, $phonenum, $room_price);
        $stmt->execute();

        // Check if the query was successful
        if ($stmt->affected_rows > 0) {
            // Update session with payment information
            $_SESSION['room']['payment'] = $payment;
            $_SESSION['room']['status'] = 'reserved';

            // Response on successful booking
            $response = array('status' => 'success', 'message' => 'Your booking has been successfully reserved!', 'payment' => $payment);
            echo json_encode($response);
        } else {
            $response = array('status' => 'error', 'message' => 'Failed to reserve the room. Please try again.');
            echo json_encode($response);
        }

        // Close the prepared statement
        $stmt->close();
    } else {
        // Handle SQL errors
        $response = array('status' => 'error', 'message' => 'Database error: ' . $con->error);
        echo json_encode($response);
    }

    // Close the database connection
    $con->close();
}
?>
