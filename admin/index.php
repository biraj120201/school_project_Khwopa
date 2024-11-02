<?php
require('inc/essentials.php');
require('inc/db_config.php');

session_start(); // Ensure this is at the top, before any output

// Check if the admin is logged in
if ((isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    redirect('dashboard.php'); // Redirect if not logged in
    exit(); // Always good to exit after a redirect
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin login-panel</title>
  <?php require('inc/links.php');
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
        <!-- Password input field -->
        <div class="mb-4">
          <input name="admin_pass" required type="password" class="form-control shadow-none text-center" placeholder="password">
        </div>
        <button name="login" type="submit" class="btn text-black custom-bg shadow-none">Login</button>
      </div>
    </form>
  </div>




  <?php
  if (isset($_POST['login'])) {
    $frm_data = filtration($_POST);

    $query = "SELECT * FROM `admin_cred` WHERE `admin_name`=? AND `admin_pass`=?";
    $values = [$frm_data['admin_name'], $frm_data['admin_pass']];

    $res = select($query, $values, "ss");
    if ($res->num_rows == 1) {
      $row = mysqli_fetch_assoc($res);
      session_start();
      $_SESSION['adminLogin'] = true;
      $_SESSION['adminId'] = $row['sr_no'];
      redirect('dashboard.php');
    } else {
      alert('error', 'login failed-Invalid Crediantials');
    }
  }

  ?>





</body>

</html>