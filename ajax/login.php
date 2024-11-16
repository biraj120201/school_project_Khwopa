<?php
session_start();
require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');

// Validate and filter POST data
$data = filtration($_POST);

// Check if the user exists based on email or phone number
$u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", 
                  [$data['email_mob'], $data['email_mob']], "ss");

if (mysqli_num_rows($u_exist) == 0) {
    echo 'inv_email_mob'; // No user found with that email/phone
    exit;
} else {
    $u_fetch = mysqli_fetch_assoc($u_exist);

    // Check if user is active
    if ($u_fetch['status'] == 0) {
        echo 'inactive'; // User account is inactive
        exit;
    } else {
        // Verify the password
        if (!password_verify($data['pass'], $u_fetch['password'])) {
            echo 'invalid_pass'; // Invalid password
            exit;
        } else {
            // Set session variables for user
            $_SESSION['login'] = true;  // Mark user as logged in
            $_SESSION['uId'] = $u_fetch['id'];  // Store user ID
            $_SESSION['uName'] = $u_fetch['name'];  // Store user name
            $_SESSION['uPic'] = $u_fetch['profile'];  // Store user profile picture (if available)
            $_SESSION['uPhone'] = $u_fetch['phonenum'];  // Store user phone number

            echo 1; // Successful login
        }
    }
}
?>
