<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('inc/fonts.php'); ?>
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

    .landscape-image {
      object-fit: cover;
      /* Ensures the image covers the container without distortion */
      height: 300px;
      /* Adjust the height as needed */
      width: 100%;
      /* Ensures it takes up the full width of the container */
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
      Your home away from home, offering comfort, luxury, and exceptional service for both business and leisure stays.
    </p>
  </div>
  <div class="container">
    <div class="row justify-content-between align-items-center">
      <div class="col-lg-6 col-md-5 mb-4 order-lg-1 order-md-1 order-2">
        <h3 class="mb-3"><?php echo $settings_r['site_title']; ?>.</h3>
        <p>
          ⭐️⭐️⭐️⭐️⭐️<br>
          "A Hidden Gem in the Heart of the City!"<br>
          I had an absolutely wonderful stay at Hotel Riddhi Siddhi! The location is perfect—close to all major attractions but still peaceful and relaxing. The staff was incredibly friendly and attentive, always ready to help with a smile. My room was spacious, clean, and beautifully furnished. The breakfast spread was amazing! Will definitely stay here again next time I’m in town.
          <br><br>
          — Samantha W.
        </p>
      </div>
      <div class="col-lg-5 col-md-6 mb-4 order-lg-2 order-md-2 order-1">
        <img src="pictures/about/p2.jpg" class="img-fluid w-100 landscape-image">
      </div>

    </div>
  </div>
  <div class="container mt-5">
    <div class="row">
      <div class="col-lg-3 col-md-6 px-4 ">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          
          <img src="pictures/about/b1.png" width="70px">
          <h4 class="mt-3">No.1</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/about/b3.png" width="70px">
          <h4 class="mt-3">Best Food</h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/about/b4.png" width="70px">
          <h4 class="mt-3">Since 1950 </h4>
        </div>
      </div>
      <div class="col-lg-3 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4 border-top border-4 text-center box border-dark">
          <img src="pictures/about/b5.png" width="70px">
          <h4 class="mt-3">100+ COSTUMERS</h4>
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

        while ($row = mysqli_fetch_assoc($about_r)) {
          echo <<<data
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
