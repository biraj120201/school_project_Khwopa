<?php
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);

require('../admin/inc/db_config.php');
require('../admin/inc/essentials.php');


if (isset($_POST['register'])) {
    // Log received POST data for debugging
    error_log("Register form data received: " . print_r($_POST, true));
    error_log("Files data: " . print_r($_FILES, true));

    // Validate and filter data
    $data = filtration($_POST);

    // Match the password and confirm password
    if ($data['pass'] != $data['cpass']) {
        echo 'pass_missmatch';
        exit;
    }

    // Check if user already exists
    $u_exist = select("SELECT * FROM `user_cred` WHERE `email` = ? OR `phonenum` = ? LIMIT 1", 
                      [$data['email'], $data['phonenum']], "ss");
    
    if (mysqli_num_rows($u_exist) != 0) {
        $u_exist_fetch = mysqli_fetch_assoc($u_exist);
        echo ($u_exist_fetch['email'] == $data['email']) ? 'email_already' : 'phone_already';
        exit;
    }

    // Process and upload the profile image
    $img = uploadUserImage($_FILES['profile']);
    if ($img == 'inv_img') {
        echo 'inv_img';
        exit;
    } else if ($img == 'upd_failed') {
        echo 'upd_failed';
        exit;
    }

    $enc_pass = password_hash($data['pass'], PASSWORD_BCRYPT);

    $query = "INSERT INTO `user_cred`(`name`, `email`, `address`, `phonenum`, `pincode`, `dob`, `profile`, `password`) 
              VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    
    $values = [$data['name'], $data['email'], $data['address'], $data['phonenum'], $data['pincode'], $data['dob'], $img, $enc_pass];
    
    if (insert($query, $values, 'ssssssss')) {
        echo '1';  // Success
    } else {
        echo 'ins_failed';  // Insertion failed
    }
} else {
    echo 'No register data received';
    exit;
}

?>
