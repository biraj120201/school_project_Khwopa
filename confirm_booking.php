<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required fonts -->
    <?php require('inc/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Riddhi Siddhi - CONFIRM BOOKINGS</title>
    <!-- Required links -->
    <?php require('inc/links.php'); ?>
    <style>
        /* Add any additional custom styles here */
    </style>
</head>

<body class="bg-light">
    <!-- Header -->
    <?php require('inc/header.php'); ?>

    <?php
    /*
    CHECK ROOM ID FROM URL IS PRESENT OR NOT
    SHUT DOWN MODE IS ACTIVE OR NOT
    USER IS LOGGED IN OR NOT
    */

    if (!isset($_GET['id']) || $settings_r['shutdown'] == true) {
        redirect('rooms.php');
    } else if (!(isset($_SESSION['login']) && $_SESSION['login'] == true)) {
        redirect('rooms.php');
    }

    // Filter and get room and users data
    $data = filtration($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
    $_SESSION['room'] = [
        "id" => $room_data["id"],
        "name" => $room_data["name"],
        "price" => $room_data["price"],
        "payment" => null,
        "available" => false,
    ];
    $user_res = $u_exist = select(
        "SELECT * FROM `user_cred` WHERE `id` = ? LIMIT 1",
        [$_SESSION['uId']],
        "i"
    );
    $user_data = mysqli_fetch_assoc($user_res);

    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold h-font">CONFIRM BOOKINGS</h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                    <span>></span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a>
                    <span>></span>
                    <a href="#" class="text-secondary text-decoration-none">CONFIRM</a> <br>
                    <span class="text-secondary text-decoration-none">swipe>>></span>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <?php
                $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
                $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
                     WHERE `room_id`='$room_data[id]' 
                     AND `thumb`='1'");

                if (mysqli_num_rows($thumb_q) > 0) {
                    $thumb_res = mysqli_fetch_assoc($thumb_q);
                    $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
                }
                echo <<<data
                        <div class="card p-3 shadow-sm rounded">
                            <img src="$room_thumb" class="img-fluid rounded">
                            <h5>$room_data[name]</h5>
                            <h6>$$room_data[price] per night</h6>
                        </div>

                     data;
                ?>

            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 b-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <form action="#" id="booking_form">
                            <h6 class="mb-3">BOOKING DETAILS</h6>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" value="<?php echo $user_data['name'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Phone Number</label>
                                    <input type="number" name="phonenum" value="<?php echo $user_data['phonenum'] ?>" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="form-label">Address</label>
                                    <textarea name="address" class="form-control shadow-none" rows="1" required><?php echo $user_data['address'] ?></textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check-in</label>
                                    <input type="date" onchange="check_availability()" name="checkin" class="form-control shadow-none" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">Check-out</label>
                                    <input type="date" onchange="check_availability()" name="checkout" class="form-control shadow-none" required>
                                </div>
                                <div class="col-12">
                                    <div class="spinner-border text-info mb-3 d-none" id="info_loader" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>

                                    <h6 class="mb-3 text-danger" id="pay_info">Provide check-in and check-out date!</h6>

                                    <button name="pay_now" id="pay_now" class="btn w-100 text-white custom-bg shadow-none mb-1" style="background-color: #2ec1ac;" onclick="reserveNow()" disabled>Reserve Now</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
    <!-- JavaScript -->
    <script>
        let booking_form = document.getElementById('booking_form');
        let info_loader = document.getElementById('info_loader');
        let pay_info = document.getElementById('pay_info');

        // Function to check room availability when dates are selected
        function check_availability() {
            let checkin_val = booking_form.elements['checkin'].value;
            let checkout_val = booking_form.elements['checkout'].value;
            booking_form.elements['pay_now'].setAttribute('disabled', true);

            if (checkin_val !== '' && checkout_val !== '') {
                pay_info.classList.add('d-none'); // Hide error message
                pay_info.classList.replace('text-dark','text-danger');
                info_loader.classList.remove('d-none'); // Show loader

                let data = new FormData();
                data.append('check_availability', '');
                data.append('check_in', checkin_val);
                data.append('check_out', checkout_val);

                let xhr = new XMLHttpRequest();
                xhr.open("POST", "ajax/confirm_booking.php", true);

                xhr.onload = function() {
                    let data = JSON.parse(xhr.responseText);

                    if (data.status == 'check_in_out_out_equal') {
                        pay_info.innerText = "Check-in and check-out dates cannot be the same.";
                    } else if (data.status == 'check_out_earlier') {
                        pay_info.innerText = "Check-out dates cannot be earlier than check-in date.";
                    } else if (data.status == 'check_in_earlier') {
                        pay_info.innerText = "Check-in date cannot be earlier than today's date.";
                    } else if(data.status == 'unavailable'){
                        pay_info.innerText = "Sorry, the room is not available for the selected dates.";
                    } else {
                        pay_info.innerHTML = "No. of Days:"+data.days+"<br>Total Amount to pay:$"+data.payment;
                        pay_info.classList.replace('text-danger','text-dark');
                        booking_form.elements['pay_now'].removeAttribute('disabled');
                    }

                    pay_info.classList.remove('d-none');
                    info_loader.classList.add('d-none');
                }

                xhr.send(data);
            }
        }
        function reserveNow() {
    let booking_form = document.getElementById('booking_form');
    let checkin_val = booking_form.elements['checkin'].value;
    let checkout_val = booking_form.elements['checkout'].value;
    let name_val = booking_form.elements['name'].value;
    let phone_val = booking_form.elements['phonenum'].value;
    let address_val = booking_form.elements['address'].value;

    // Check if the form fields are valid
    if (name_val === '' || phone_val === '' || address_val === '' || checkin_val === '' || checkout_val === '') {
        alert('Please fill in all fields before submitting.');
        return;
    }

    // Disable the Reserve Now button and show the loader
    let pay_button = document.getElementById('pay_now');
    let info_loader = document.getElementById('info_loader');
    let pay_info = document.getElementById('pay_info');
    pay_button.disabled = true;
    info_loader.classList.remove('d-none'); // Show loader

    // Prepare data to send
    let data = new FormData();
    data.append('reserve_now', true);
    data.append('name', name_val);
    data.append('phonenum', phone_val);
    data.append('address', address_val);
    data.append('checkin', checkin_val);
    data.append('checkout', checkout_val);
    data.append('room_id', <?php echo $_SESSION['room']['id']; ?>);  // Room ID from PHP session
    data.append('room_name', "<?php echo $_SESSION['room']['name']; ?>"); // Room Name from PHP session
    data.append('price',"<?php echo $_SESSION['room']['price']; ?>")
    data.append('user_name', name_val);  // User Name from form input

    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/confirm_booking.php", true); // The PHP script that will handle the reservation

    xhr.onload = function () {
        // Hide loader and enable the Reserve button
        info_loader.classList.add('d-none');
        pay_button.disabled = false;

        let response = JSON.parse(xhr.responseText);

        if (response.status === 'success') {
            pay_info.innerHTML = "Booking confirmed! Total payment: $" + response.payment;
            pay_info.classList.replace('text-danger', 'text-success');
        } else {
            pay_info.innerHTML = response.message || "An error occurred. Please try again.";
            pay_info.classList.replace('text-success', 'text-danger');
        }

        pay_info.classList.remove('d-none');
        booking_form.reset();
    }

    xhr.send(data);
}

    </script>

</body>

</html>