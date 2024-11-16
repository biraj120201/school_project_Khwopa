<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required fonts -->
    <?php require('inc/fonts.php'); ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Riddhi Siddhi - ROOMS DETAILS</title>
    <!-- Required links -->
    <?php require('inc/links.php'); ?>
    <style>
        /* Add any additional custom styles here */
    </style>
</head>

<body class="bg-light">
    <!-- Header -->
    <?php require('inc/header.php'); ?>

    <?php
    // Check for room ID
    if (!isset($_GET['id'])) {
        redirect('rooms.php');
    }

    // Filter and fetch room data
    $data = filtration($_GET);
    $room_res = select("SELECT * FROM `rooms` WHERE `id`=? AND `status`=? AND `removed`=?", [$data['id'], 1, 0], 'iii');

    if (mysqli_num_rows($room_res) == 0) {
        redirect('rooms.php');
    }

    $room_data = mysqli_fetch_assoc($room_res);
    ?>

    <div class="container">
        <div class="row">
            <div class="col-12 my-5 mb-4 px-4">
                <h2 class="fw-bold h-font"><?php echo $room_data['name'] ?></h2>
                <div style="font-size: 14px;">
                    <a href="index.php" class="text-secondary text-decoration-none">Home</a>
                    <span>></span>
                    <a href="rooms.php" class="text-secondary text-decoration-none">Rooms</a> <br>
                    <span class="text-secondary text-decoration-none">swipe>>></span>
                </div>
            </div>

            <div class="col-lg-7 col-md-12 px-4">
                <div id="roomCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                    <div class="carousel-inner">
                        <?php
                        $room_img = ROOMS_IMG_PATH . "thumbnail.jpg";
                        $img_q = mysqli_query($con, "SELECT * FROM `room_images` WHERE `room_id`='$room_data[id]'");

                        if (mysqli_num_rows($img_q) > 0) {
                            $active_class = 'active';
                            while ($img_res = mysqli_fetch_assoc($img_q)) {
                                echo "
                                    <div class='carousel-item $active_class'>
                                        <img src='" . ROOMS_IMG_PATH . $img_res['image'] . "' class='d-block w-100 rounded' >
                                    </div>
                                ";
                                $active_class = '';
                            }
                        } else {
                            echo "
                                <div class='carousel-item active'>
                                    <img src='$room_img' class='d-block w-100'>
                                </div>";
                        }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#roomCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#roomCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            </div>

            <div class="col-lg-5 col-md-12 px-4">
                <div class="card mb-4 b-0 shadow-sm rounded-3">
                    <div class="card-body">
                        <?php
                        echo <<<price
                            <h4>$$room_data[price] per night</h4>
                        price;

                        echo <<<rating
                            <div class="mb-3">
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-fill text-warning"></i>
                                <i class="bi bi-star-half text-warning"></i>
                            </div>
                        rating;

                        $fea_q = mysqli_query($con, "SELECT f.name FROM `features` f
                            INNER JOIN `room_features` rfea ON f.id = rfea.features_id
                            WHERE rfea.room_id = '$room_data[id]'");

                        $features_data = "";
                        while ($fea_row = mysqli_fetch_assoc($fea_q)) {
                            $features_data .= "<span class='badge bg-light text-dark rounded-pill text-wrap me-1 mb-1'>
                                $fea_row[name]
                                </span>";
                        }
                        echo <<<features
                            <div class="mb-3">
                                <h6 class="mb-1">Features</h6>
                                $features_data
                            </div>
                        features;

                        $fac_q = mysqli_query($con, "SELECT f.name FROM `facilities` f 
                            INNER JOIN `room_facilities` rfac ON f.id = rfac.facilities_id
                            WHERE rfac.room_id ='$room_data[id]'");
                        $facilities_data = "";
                        while ($fac_row = mysqli_fetch_assoc($fac_q)) {
                            $facilities_data .= "<span class='badge bg-light text-dark rounded-pill text-wrap'>
                                $fac_row[name]
                                </span>";
                        }
                        echo <<<facilities
                            <div class="mb-3">
                                <h6 class="mb-1">Facilities</h6>
                                $facilities_data
                            </div>
                        facilities;

                        echo <<<guests
                            <div class="mb-3">
                                <h6 class="mb-1">Guests</h6>
                                <span class='badge bg-light text-dark rounded-pill text-wrap'>$room_data[adult] Adults</span>
                                <span class='badge bg-light text-dark rounded-pill text-wrap'>$room_data[children] Children</span>
                            </div>
                        guests;

                        echo <<<area
                            <div class="mb-3">
                                <h6 class="mb-1">Area</h6>
                                <span class='badge bg-light text-dark rounded-pill text-wrap me-1 mb-1'>
                                    $room_data[area] sq. ft.
                                </span>
                            </div>
                        area;
                        $book_btn = "";
                        if (!$settings_r['shutdown']){
                            $login=0;
                        if (isset($_SESSION['login']) && $_SESSION['login'] == true) {
                        $login = 1;
                        }
                        $book_btn = "<button onclick='checkLoginToBook($login,$room_data[id])' class='btn w-100 text-dark custom-bg shadow-none mb-1' style='background-color: #2ec1ac;'>Book Now</button>";
                
                        }
                        

                        echo <<<book
                            $book_btn
                        book;
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4 px-4">
                <div class="mb-4">
                    <h5>Description</h5>
                    <p mb-3>
                        <?php echo $room_data['description'] ?>
                    </p>
                </div>
                <div>
                    <h5 class="mb-3"> Review and Ratings</h5>
                    <div>
                        <div class=" d-flex align-item-center mb-2">
                            <img src="pictures/food_picture/food_pic1.jpg" width="30px" alt="">
                            <h6 class="m-0  ms-2">Nina and Family</h6>
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
                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <?php require('inc/footer.php'); ?>
</body>

</html>