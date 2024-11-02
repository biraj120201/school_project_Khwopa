<!DOCTYPE html>
<html lang="en">

<head>
  <?php require('inc/fonts.php'); ?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Riddhi Siddhi - ROOMS</title>
  <?php require('inc/links.php'); ?>
  <style>
    /* Add any additional custom styles here */
  </style>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>

  <div class="my-5 px-4">
    <h2 class="fw-4-bold h-font text-center">OUR ROOMS</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Modi, tempora! Tempora recusandae dolorem <br> excepturi.
      Eaque distinctio quae, tempore cum porro doloremque suscipit reprehenderit velit totam.
      Ad modi at cupiditate eos.
    </p>
  </div>

  <div class="container-fluid"> 
    <div class="row">

      <div class="col-lg-3 col-md-12 mb-lg-0 mb-4 px-lg-0">
        <nav class="navbar navbar-expand-lg navbar-light bg-white rounded shadow">
          <div class="container-fluid flex-lg-column align-items-stretch">
            <h4 class="mt-2">FILTERS</h4>
            <button class="navbar-toggler shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#filterDropDown" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse flex-column align-items-stretch mt-2" id="filterDropDown">
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">CHECK AVAILABILITY</h5>
                <label class="form-label">Check-in</label>
                <input type="date" class="form-control shadow-none mb-3">
                <label class="form-label">Check-out</label>
                <input type="date" class="form-control shadow-none">
              </div>
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">FACILITIES</h5>
                <div class="mb-2">
                  <input type="checkbox" id="f1" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f1">Facility One</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f2" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f2">Facility Two</label>
                </div>
                <div class="mb-2">
                  <input type="checkbox" id="f3" class="form-check-input shadow-none me-1">
                  <label class="form-check-label" for="f3">Facility Three</label>
                </div>
              </div>
              <div class="border bg-light p-3 rounded mb-3">
                <h5 class="mb-3" style="font-size: 18px;">GUESTS</h5>
                <div class="d-flex">
                  <div class="me-3">
                    <label class="form-label">Adults</label>
                    <input type="number" class="form-control shadow-none">
                  </div>
                  <div>
                    <label class="form-label">childrens</label>
                    <input type="number" class="form-control shadow-none">
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
      </div>

      <div class="col-lg-9 col-md-12 px-4">
        <!-- room number 1  -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 mt-lg-0 mt-md-0 mt-4 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#"  class="btn btn-sm w-100 text-dark custom-bg shadow-none mb-2" style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
        <!-- room number 2  -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
        <!-- room number 3 -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
        <!-- room number 4  -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
        <!-- room number 5  -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
        <!-- room number 6  -->
        <div class="card mb-4 b-0 shadow">
          <div class="row g-0 p-3 align-items-center">
            <div class="col-md-5 mb-lg-0 mb-md-0 mb-3">
              <img src="pictures/room_pic_animated/99.jpg" class="img-fluid rounded">
            </div>
            <div class="col-md-5 px-lg-3 px-md-3 px-0">
              <h5 class="mb-3">Simple Room Name</h5>
              <div class="features mb-3">
                <h6 class="mb-1">Features</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Rooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">2 Bathrooms</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">1 Balcony</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">3 Sofas</span>
              </div>
              <div class="facilities mb-3">
                <h6 class="mb-1">Facilities</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Wifi</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Telephone</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">AC</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">Room Heater</span>
              </div>
              <div class="guests">
                <h6 class="mb-1">Guests</h6>
                <span class="badge bg-light text-dark rounded-pill text-wrap">5 Adults</span>
                <span class="badge bg-light text-dark rounded-pill text-wrap">4 Children</span>
              </div>
            </div>
            <div class="col-md-2 text-center">
              <h6 class="mb-4">$250 per night</h6>
              <a href="#" class="btn btn-sm w-100 text-white custom-bg shadow-none mb-2"style="background-color: #2ec1ac;">Book Now</a>
              <a href="#" class="btn btn-outline-dark w-100 shadow-none">More details</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- footer -->
  <?php require('inc/footer.php') ?>
</body>

</html>