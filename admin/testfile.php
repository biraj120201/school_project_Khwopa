<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Admin Panel - Dashboard</title>
  <?php require('../admin/css/style.php'); ?>
</head>

<body class="bg-light">

  <div class="container-fluid bg-dark text-light p-3 d-flex align-items-center justify-content-between">
    <h3 class="mb-0 h-font">HRS-WEBSITE</h3>
    <a href="logout.php" class="btn btn-light btn-sn">LOG OUT</a>
  </div>
  <div class="col-lg-2 bg-dark border-top border-3 border-secondary">
    <nav class="navbar navbar-expand bg-dark" id="dashboard-menu">
      <div class="container-fluid bg-dark flex-lg-column align-items-stretch">
        <h4 class="mt-2 text-white">Admin panel</h4>
        <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#adminDropDown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="adminDropDown">
          <ul class="nav nav-pills flex-column">
            <li class="nav-item">
              <a class="nav-link text-white" href="dashboard.php">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-blue" href="#">rooms</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-blue" href="#">user</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-blue" href="settings.php">settings</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  </div>





  <!-- Bootstrap JS Bundle -->
  <?php require('../admin/inc/scripts.php'); ?>
</body>

</html>