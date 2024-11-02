<!DOCTYPE html>
<html lang="en">

<head>
<?php require('inc/fonts.php');?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Riddhi Siddhi -about</title>
  <!-- necessart links  -->
  <?php require('inc/links.php'); ?>
  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
  <style>
    .box:hover {
      border-top-color: var(--teal) !important;
      transform: scale(1.03);
      transition: all 0.3s;
    }

    .box:active {
      border-top-color: white !important;
      /* Change border color to white on click */
    }
  </style>
</head>

<body class="bg-light">
  <!-- header -->
  <?php require('inc/header.php'); ?>
  <div class="my-5 px-4">
    <h2 class="fw-4-bold h-font text-center">ABOUT US</h2>

    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Modi, tempora! Tempora recusandae dolorem excepturi.
      Eaque distinctio quae, tempore <br>cum porro doloremque suscipit reprehenderit velit totam.
      Ad modi at cupiditate eos.
    </p>
  </div>
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3">Lorem ipsum dolor sit.</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Magnam consectetur quia itaque nobis aspernatur tempore
          voluptates!
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Magnam consectetur quia itaque nobis aspernatur tempore
          voluptates!
        </p>
      </div>
      <div class="col-lg-5 col-md-mb-4 order-lg-2 order-md-2 order-1">
        <img src="pictures/hotel_pic_animated/hotel_pic_animated5.webp" class="w-100">
      </div>
    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 px-4 ">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/room_pic_animated/room_pic_animated12.webp" width="70px">
          <h4 class="mt-3"> 100+rooms</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/room_pic_animated/room_pic_animated13. webp" width="70px">
          <h4 class="mt-3"> 200+ CUSTOMERS</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/room_pic_animated/room_pic_animated12.webp" width="70px">
          <h4 class="mt-3">150+ REVIEWS </h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/room_pic_animated/room_pic_animated12.webp" width="70px">
          <h4 class="mt-3">200+ STAFFS</h4>
        </div>
      </div>
    </div>
  </div>

  <h3 class="my-5 fw-bold h-font text-center">MANAGEMENT TEAM</h3>
  <!-- photo of management team with swiper effect  -->
  <div class="container px-4">
    <!-- Swiper -->
    <div class="swiper mySwiper">
      <div class="swiper-wrapper mb-5">
        <?php
        $about_r = SelectAll('team_details');
        $path = ABOUT_IMG_PATH;

        while($row = mysqli_fetch_assoc($about_r)){
          echo<<<data
            <div class="swiper-slide bg-white text-center overflow-hidden rounded">
              <img src="$path$row[picture]" class="w-100">
              <h5 class="mt-2">$row[name]</h5>
            </div>
          data;
        }
        ?>
      </div>
      <div class="swiper-pagination"></div>
    </div>
  </div>



  <!-- footer  -->
  <?php require('inc/footer.php') ?>

  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

  <!-- Initialize Swiper -->
  <script>
    var swiper = new Swiper(".mySwiper", {
      spaceBetween: 40,
      loop: true,
      pagination: {
        el: ".swiper-pagination",
        dynamicBullets: true,
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        780: {
          slidesPerView: 3,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  </script>
</body>

</html>