<?php
// Start the session first, before anything else
session_start(); 

// Include essential files and database config
require('inc/essentials.php');
require('inc/db_config.php');

// Ensure this check is placed early in the script to redirect logged-in users
if (isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] === true) {
    redirect('dashboard.php'); // Redirect if already logged in
    exit(); // Always exit after redirection
}

// Check if the login form is submitted
if (isset($_POST['login'])) {
    $frm_data = filtration($_POST);  // Sanitize the form data

    // Query to check admin credentials
    $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];
    $res = select($query, $values, "ss");

    // Check if credentials are valid
    if ($res->num_rows == 1) {
        $row = mysqli_fetch_assoc($res);
        
        // Set session variables upon successful login
        $_SESSION['adminLogin'] = true;
        $_SESSION['adminId'] = $row['sr_no'];
        
        // Redirect to the dashboard
        redirect('dashboard.php');
    } else {
        // If login fails, show an error message
        alert('error', 'Login failed - Invalid credentials');
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login-panel</title>
  <?php 
    require('inc/links.php');
    require('css/style.php');
  ?>
  <style>
    div.login-form {
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      width: 400px;
    }
  </style>
</head>

<body class="bg-light">

  <div class="login-form text-center rounded bg-white shadow overflow-hidden">
    <form method="post">
      <h4 class="bg-dark text-white py-3"> ADMIN LOGIN PANEL</h4>
      <div class="p-4">
        <div class="mb-3">
          <input name="admin_name" required type="text" class="form-control shadow-none text-center" placeholder="Admin name">
        </div>
        <div class="mb-4">
          <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="password">
        </div>
        <button name="login" type="submit" class="btn text-black custom-bg shadow-none">Login</button>
      </div>
    </form>
  </div>

</body>

</html>





</body>

</html>