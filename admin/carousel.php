<?php require('inc/essentials.php'); ?>
<?php include('inc/scripts.php'); ?>
<?php adminLogin(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Settings Page - Carousel</title>
  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Merienda:wght@300..900&family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

  <?php require('css/style.php'); ?>
</head>

<body class="bg-light">
  <?php require('inc/header.php'); ?>
  <div>
    <div class="container-fluid" id="main-content">
      <div class="row">
        <div class="col-lg-10 ms-auto p-4 overflow-hidden">
          <h3 class="m-b-4">Carousel</h3>


          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">photo</h5>
                <button type="button" class="btn btn-dark shadow-none btn-sn" data-bs-toggle="modal" data-bs-target="#carousel-s">
                  <i class="bi bi-plus-square me-1"></i>Add
                </button>
              </div>
              <div class="row" id="carousel-data">
               
              </div>
            </div>
          </div>
          <!-- carousel Modal -->
          <div class="modal fade" id="carousel-s" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form id="carousel_s_form">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Add image</h5>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label fw-bold">Picture</label>
                      <input type="file" name="carousel_picture" id="carousel_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="carousel_picture.value='' " class="btn text-secondary text-dark shadow-none custom-bg" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" class="btn text-secondary text-dark shadow-none custom-bg">SUBMIT</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <?php require('inc/links.php'); ?>
  <script src="scripts/carousel.js"></script>
</body>

</html>