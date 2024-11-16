<!DOCTYPE html>
<html lang="en">

<head>
<?php require('inc/fonts.php');?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Riddhi Siddhi - facilities</title>
  <?php require('inc/links.php'); ?>
  <style>
    .pop:hover {
      border-top-color: #2ec1ac !important;
      transform: scale(1.03);
      transition: all 0.3s;
    }
    .pop:active {
    border-top-color: #279e8c !important; /* Change border color to white on click */
  }
  </style>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-4-bold h-font text-center">OUR FACILITIES</h2>

    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
    At Hotel Riddhi Siddhi, we offer a range of world-class facilities to make your stay comfortable, convenient, and memorable.<br> Explore the amenities that cater to both relaxation and business needs.
    </p>
  </div>
  <div class="container">
    <div class="row">
    <?php
      $res = selectAll('facilities');
      $path = FEATURES_IMG_PATH;
      while($row = mysqli_fetch_assoc($res)){
       echo<<<data
        <div class="col-lg-4 col-md-5 px-4 py-4  ">
          <div class="bg-white rounded shadow p-4 border-top border-4 border-dark pop">
            <div class="d-flex align-items-center mb-2">
              <img src="$path$row[icon]" alt="wifi icon" width="40px">
              <h5 class="m-0 ms-3">$row[name]</h5>
            </div>
            <p>
              $row[description]
            </p>
          </div>
        </div>
       data;
      }
    ?>
    </div>
  </div>

  <!-- footer  -->
  <?php require('inc/footer.php') ?>



</body>

</html>