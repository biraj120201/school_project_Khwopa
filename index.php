<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

?>

<!DOCTYPE html>
<html lang="en">
<?php require('inc/links.php'); ?>

<head>
  <?php require('inc/fonts.php'); ?>

  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Riddhi Siddhi - home</title>


  <!-- Swiper CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>

  <!-- Swiper Effect (Carousel) -->
  <div class="container-fluid px-lg-4 mt-4">
    <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <?php
        $res = selectAll('carousel');
        while ($row = mysqli_fetch_assoc($res)) {
          $path = CAROUSEL_IMG_PATH;
          echo <<<data
              <div class="swiper-slide">
                <img src="$path$row[image]" class="w-100 d-block" alt="Hotel Image 1">
            </div>
           data;
        }
        ?>
      </div>
    </div>
  </div>

  <!-- Check Availability Form -->
  <div class="container availability-form">
    <div class="row">
      <div class="col-lg-12 bg-white shadow p-4 rounded">
        <h5 class="mb-4">Check Booking Availability</h5>
        <form>
          <div class="row align-items-end">
            <!-- Check-in date -->
            <div class="col-lg-3 mb-3">
              <label class="form-label">Check-in</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <!-- Check-out date -->
            <div class="col-lg-3 mb-3">
              <label class="form-label">Check-out</label>
              <input type="date" class="form-control shadow-none">
            </div>
            <!-- Adults number -->
            <div class="col-lg-3 mb-3">
              <label class="form-label">Adults</label>
              <select class="form-select shadow-none">
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
              </select>
            </div>
            <!-- Children number -->
            <div class="col-lg-2 mb-3">
              <label class="form-label">Children</label>
              <select class="form-select shadow-none">
                <option value="0">None</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
              </select>
            </div>
            <!-- Submit button -->
            <div class="col-lg-1 mb-lg-3 mt-2">
              <button type="submit" class="btn text-white shadow-none custom-bg">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Our Rooms -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR ROOMS</h2>

  <div class="container">
    <!-- Room number 1 -->
    <div class="row">
      <div class="col-lg-4 col-md-6 my-3">
        <!-- Room Card -->
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
          <img src="pictures/room_pic_animated/room_pic_animated2.webp" class="card-img-top" alt="Room Image">

          <div class="card-body">
            <h5>Simple Room Name</h5>
            <h6 class="mb-4">$250 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Rooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Bathrooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">1 Balcony</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">3 Sofas</span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Wifi</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Telephone</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">AC</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Room Heater</span>
            </div>
            <div class="guests mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">5 Adults</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">4 Childrens</span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-outline-dark shadow-none"> More details</a>
            </div>
          </div>

        </div>

      </div>
      <!-- Room number 2 -->
      <div class="col-lg-4 col-md-6 my-3">
        <!-- Room Card -->
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
          <img src="pictures/room_pic_animated/room_pic_animated3.webp" class="card-img-top" alt="Room Image">

          <div class="card-body">
            <h5>Simple Room Name</h5>
            <h6 class="mb-4">$250 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Rooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Bathrooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">1 Balcony</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">3 Sofas</span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Wifi</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Telephone</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">AC</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Room Heater</span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">5 Adults</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">4 Childrens</span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-outline-dark shadow-none"> More details</a>
            </div>
          </div>

        </div>

      </div>

      <!-- room number 3 -->
      <div class="col-lg-4 col-md-6 my-3">
        <!-- Room Card -->
        <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
          <img src="pictures/room_pic_animated/room_pic_animated4.webp" class="card-img-top" alt="Room Image">

          <div class="card-body">
            <h5>Simple Room Name</h5>
            <h6 class="mb-4">$250 per night</h6>
            <div class="features mb-4">
              <h6 class="mb-1">Features</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Rooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">2 Bathrooms</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">1 Balcony</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">3 Sofas</span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Facilities</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Wifi</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Telephone</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">AC</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">Room Heater</span>
            </div>
            <div class="facilities mb-4">
              <h6 class="mb-1">Guests</h6>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">5 Adults</span>
              <span class="badge bg-light text-dark mb-3 text-wrap lh-base">4 Childrens</span>
            </div>
            <div class="rating mb-4">
              <h6 class="mb-1">Rating</h6>
              <span class="badge rounded-pill bg-light">
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-fill text-warning"></i>
                <i class="bi bi-star-half text-warning"></i>
              </span>
            </div>
            <div class="d-flex justify-content-evenly mb-2">
              <a href="#" class="btn btn-sm text-white custom-bg shadow-none">Book Now</a>
              <a href="#" class="btn btn-outline-dark shadow-none"> More details</a>
            </div>
          </div>

        </div>

      </div>

      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>>></a>
      </div>
    </div>
  </div>
  <!-- ourfacilities -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="pictures/facilities/3.svg" alt="wifi icon" width="80px">
        <h5 class="mt-3">Wifi</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="pictures/facilities/1.svg" alt="Geyser icon" width="80px">
        <h5 class="mt-3">Geyser</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="pictures/facilities/2.svg" alt="TV icon" width="80px">
        <h5 class="mt-3">TV</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="pictures/facilities/p-circle-fill.svg" alt="parking icon" width="80px">
        <h5 class="mt-3">Parking</h5>
      </div>
      <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
        <img src="pictures/facilities/gym-station-svgrepo-com.svg" alt="GYM icon" width="80px">
        <h5 class="mt-3">GYM</h5>
      </div>
      <div class="col-lg-12 text-center mt-5">
        <a href="facilities.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Facilities >>>></a>
      </div>
    </div>
  </div>
  <!-- Testimonials -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Testimonials</h2>

  <div class="container mt-5">
    <div class="swiper swiper-testimonials">
      <div class="swiper-wrapper mb-5">

        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-item-center mb-3">
            <img src="pictures/food_picture/food_pic1.jpg" width="30px" alt="">
            <h6 class="m-0  ms-2">random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolor officiis, atque tempora, temporibus repellat ratione ut quae,
            distinctio itaque quia necessitatibus pariatur illum aperiam ullam alias doloribus porro iste sunt.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-item-center p-4">
            <img src="pictures/food_picture/food_pic1.jpg" width="30px" alt="">
            <h6 class="m-0  ms-2">random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolor officiis, atque tempora, temporibus repellat ratione ut quae,
            distinctio itaque quia necessitatibus pariatur illum aperiam ullam alias doloribus porro iste sunt.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>
        <div class="swiper-slide bg-white p-4">
          <div class="profile d-flex align-item-center p-4">
            <img src="pictures/food_picture/food_pic1.jpg" width="30px" alt="">
            <h6 class="m-0  ms-2">random user1</h6>
          </div>
          <p>
            Lorem ipsum dolor sit amet consectetur adipisicing elit.
            Dolor officiis, atque tempora, temporibus repellat ratione ut quae,
            distinctio itaque quia necessitatibus pariatur illum aperiam ullam alias doloribus porro iste sunt.
          </p>
          <div class="rating">
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-fill text-warning"></i>
            <i class="bi bi-star-half text-warning"></i>
          </div>
        </div>

      </div>
      <div class="swiper-pagination"></div>
    </div>
    <div class="col-lg-12 text-center mt-5">
      <a href="about.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none"> Know More >>>></a>
    </div>
  </div>

  <!-- reach us  -->
  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">Reach Us</h2>
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-8 p-4 mb-lg-0 mb-3 bg-white rounded">
        <iframe class="w-100 rounded"
          src="<?php echo $contact_r['iframe']; ?>"
          height="320px" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

      </div>
      <div class="col-lg-4 col-md-4">
        <div class="bg-white p-4 rounded mb-4">
          <h5>Call Us</h5>
          <a href="tel: +<?php echo $contact_r['pn1']; ?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn1']; ?>
          </a>
          <br>
          <a href="tel: +<?php echo $contact_r['pn2']; ?>" class="d-inline-block  text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn2']; ?>
          </a>
        </div>
        <div class="bg-white p-4 rounded mb-4">
          <h5>Follow Us</h5>
          <a href="<?php echo $contact_r['tw']; ?>" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-twitter-x me-1"></i>Twitter-X
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['fb']; ?>" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-facebook me-1"></i>Facebook
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['insta']; ?>" target="_blank" class="d-inline-block mb-3">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-instagram me-1"></i>Instagram
            </span>
          </a>
          <br>
          <a href="<?php echo $contact_r['threads']; ?>" target="_blank" class="d-inline-block ">
            <span class="badge bg-light text-dark fs-6 p-2">
              <i class="bi bi-threads" me-1></i>Threads
            </span>
          </a>

        </div>
      </div>
    </div>
  </div>
  <!-- footer  -->
  <?php require('inc/footer.php') ?>
  <!-- Swiper JS -->
  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  <!-- Initializing Swiper -->
  <script>
    // Initialize Swiper
    var swiper = new Swiper(".swiper-container", {
      spaceBetween: 30,
      effect: 'fade',
      loop: true, // Enable infinite loop
      autoplay: {
        delay: 3000, // Change image every 3 seconds
        disableOnInteraction: false,
      },
      fadeEffect: {
        crossFade: true, // Smooth transition effect
      },
    });
    // Initializing second swiper effect 
    var swiper = new Swiper(".swiper-testimonials ", {
      effect: "coverflow",
      grabCursor: true,
      centeredSlides: true,
      slidesPerView: "auto",
      slidesPerView: "3",
      loop: true,
      coverflowEffect: {
        rotate: 50,
        stretch: 0,
        depth: 100,
        modifier: 1,
        slideShadows: false,
      },
      pagination: {
        el: ".swiper-pagination",
      },
      breakpoints: {
        320: {
          slidesPerView: 1,
        },
        640: {
          slidesPerView: 1,
        },
        780: {
          slidesPerView: 2,
        },
        1024: {
          slidesPerView: 3,
        }
      }
    });
  </script>


</body>

</html>