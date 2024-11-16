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
  <title><?php echo $settings_r['site_title'];?>- home</title>


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

      <?php
      $room_res = select("SELECT * FROM `rooms` WHERE `status`=? AND  `removed`=? ORDER BY `id` DESC LIMIT 3", [1, 0], 'ii');

      while ($room_data = mysqli_fetch_assoc($room_res)) {

        // get features of rooms

        $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f
           INNER JOIN `room_features` rfea ON f.id = rfea.features_id
            WHERE rfea.room_id = '$room_data[id]'");

        $features_data = "";
        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
          $features_data .= "<span class='badge bg-light text-dark rounded-pill text-wrap me-1 mb-1'>
                $fea_row[name]
              </span>";
        }
        // get facilities of rooms
        $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
            INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
            WHERE rfac.room_id ='$room_data[id]'");

        $facilities_data = "";
        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
          $facilities_data .= "<span class='badge bg-light text-dark rounded-pill text-wrap me-1 mb-1'>
                $fac_row[name]
              </span>";
        }
        // get thumbnail image 

        $room_thumb = ROOMS_IMG_PATH . "thumbnail.jpg";
        $thumb_q = mysqli_query($con, "SELECT * FROM `room_images`
            WHERE `room_id`='$room_data[id]' 
            AND `thumb`='1'");

        if (mysqli_num_rows($thumb_q) > 0) {
          $thumb_res = mysqli_fetch_assoc($thumb_q); 
          $room_thumb = ROOMS_IMG_PATH . $thumb_res['image'];
        }

        $book_btn = "";
        if (!$settings_r['shutdown']){
          $login=0;
          if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
            $login = 1;
          }
          $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn btn-sm text-white custom-bg shadow-none d-flex justify-content-center align-items-center'>Book Now</button>";

        }

        //print room card
        echo <<<data
            <div class="col-lg-4 col-md-6 my-3">
              <!-- Room Card -->
              <div class="card border-0 shadow" style="max-width: 350px; margin:auto;">
                <img src="$room_thumb" class="card-img-top" alt="Room Image">

                <div class="card-body">
                  <h5>$room_data[name]</h5>
                  <h6 class="mb-4">$$room_data[price] per night</h6>
                  <div class="features mb-4">
                    <h6 class="mb-1">Features</h6>
                    $features_data
                  </div>
                  <div class="facilities mb-4">
                    $facilities_data</div>
                  <div class="guests mb-4">
                    <h6 class="mb-1">Guests</h6>
                    <span class="badge bg-light text-dark mb-3 text-wrap lh-base">$room_data[adult] Adults</span>
                    <span class="badge bg-light text-dark mb-3 text-wrap lh-base">$room_data[children] Children</span>
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
                    $book_btn
                    <a href="room_details.php?id=$room_data[id]" class="btn btn-outline-dark shadow-none"> More details</a>
                  </div>
                </div>
              </div>
            </div>
        data;
      }
      ?>

      <div class="col-lg-12 text-center mt-5">
        <a href="rooms.php" class="btn btn-sm btn-outline-dark rounded-0 fw-bold shadow-none">More Rooms >>>></a>
      </div>
    </div>
  </div>
  <!-- ourfacilities -->

  <h2 class="mt-5 pt-4 mb-4 text-center fw-bold h-font">OUR FACILITIES</h2>

  <div class="container">
    <div class="row justify-content-evenly px-lg-0 px-md-0 px-5">
      <?php
      $res = mysqli_query($con, "SELECT * FROM `facilities` ORDER BY `id` DESC LIMIT 5");
      $path = FEATURES_IMG_PATH;
      while ($row = mysqli_fetch_assoc($res)) {
        echo <<<data
          <div class="col-lg-2 col-md-2 text-center bg-white rounded shadow py-4 my-3">
            <img src="$path$row[icon]" width="60px">
            <h5 class="mt-3">$row[name]</h5>
          </div> 
       data;
      }
      ?>
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
            <img src="pictures/food_picture/food_pic10.webp" width="30px" alt="">
            <h6 class="m-0  ms-2">Michael T.</h6>
          </div>
          <p>
          <b>"Perfect for Business and Leisure!"<br></b>
          I frequently travel for business and have stayed in many hotels, but Hotel Riddhi Siddhi stands out. The hotel’s amenities are top-notch, with a great business center and fast Wi-Fi for work. The lounge areas are perfect for relaxing after a long day of meetings. On top of that, the spa and pool were great for unwinding. The blend of business and leisure facilities makes it the perfect choice for any trip!
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
            <img src="pictures/food_picture/food_pic11.webp" width="30px" alt="">
            <h6 class="m-0  ms-2">Anita D.</h6>
          </div>
          <p>
          <b>"Exceptional Service and Comfort!"<br></b>
          I stayed at Hotel Riddhi Siddhi for a weekend getaway, and it exceeded all my expectations. From the moment I walked in, I felt welcomed and well taken care of. The room was pristine, and the bed was incredibly comfortable. I also loved the on-site restaurant with its variety of delicious dishes. The staff went out of their way to ensure my stay was memorable. Highly recommend this hotel!t.
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
            <img src="pictures/food_picture/food_pic12.webp" width="30px" alt="">
            <h6 class="m-0  ms-2">Rajesh P.</h6>
          </div>
          <p>
          <b>"Perfect for Business and Leisure!"<br></b>
          I frequently travel for business and have stayed in many hotels, but Hotel Riddhi Siddhi stands out. The hotel’s amenities are top-notch, with a great business center and fast Wi-Fi for work. The lounge areas are perfect for relaxing after a long day of meetings. On top of that, the spa and pool were great for unwinding. The blend of business and leisure facilities makes it the perfect choice for any trip!
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
            <img src="pictures/food_picture/food_pic13.webp" width="30px" alt="">
            <h6 class="m-0  ms-2">Samantha W.</h6>
          </div>
          <p>
          <b>"An Incredible Stay!"<br></b>
          Hotel Riddhi Siddhi is truly a gem. The service is outstanding, and the staff really go above and beyond to make your stay comfortable. The rooms are spacious and modern, and the food is some of the best I’ve had at a hotel. I loved the peaceful atmosphere and the beautiful decor. The hotel is also in a fantastic location—close to shops and attractions but still quiet and relaxing. Will definitely be back!
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
            <img src="pictures/food_picture/food_pic14.webp" width="30px" alt="">
            <h6 class="m-0  ms-2">simran w</h6>
          </div>
          <p>
          <b>"Amazing Experience, Worth Every Penny!"<br></b>
          My family and I had an incredible experience at Hotel Riddhi Siddhi. From the moment we arrived, we were treated with warmth and hospitality. The hotel offers everything you could need: comfortable rooms, delicious food, and excellent service. We especially enjoyed the outdoor pool and the relaxing spa services.
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