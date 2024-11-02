<!DOCTYPE html>
<html lang="en">

<head>
<?php require('inc/fonts.php');?>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Hotel Riddhi Siddhi - Contact</title>
  <?php require('inc/links.php'); ?> 
  <style>
    .custom-alert {
      position: fixed; /* Fixed positioning */
      top: 20px; /* Position from the top */
      right: 20px; /* Position from the right */
      z-index: 1050; /* Ensure it appears above other content */
      width: calc(100% - 40px); /* Responsive width */
      max-width: 500px; /* Set a maximum width */
    }
  </style>
  <?php require('inc/header.php'); ?>

</head>

<body class="bg-light">
  
  <div class="my-5 px-4">
    <h2 class="fw-4-bold h-font text-center">CONTACT US</h2>
    <div class="h-line bg-dark"></div>
    <p class="text-center mt-3">
      Lorem ipsum dolor, sit amet consectetur adipisicing elit.
      Modi, tempora! Tempora recusandae dolorem <br> excepturi.
      Eaque distinctio quae, tempore cum porro doloremque suscipit reprehenderit velit totam.
      Ad modi at cupiditate eos.
    </p>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-lg-6 col-md-5 mb-6 px-4">
        <div class="bg-white rounded shadow p-4">
          <iframe class="w-100 rounded mb-4"
            src="<?php echo $contact_r['iframe'];?>"
            height="320px" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          <h5>Address</h5>
          <a href="<?php echo $contact_r['gmap']?>" target="_blank" class="d-line-block text-decoration-none text-dark mb-2">
            <i class="bi bi-geo-alt"></i>Hotel Riddhi Siddhi, Bhaktapur
          </a>
          <h5 class="mt-4">Call Us</h5>
          <a href="tel: +<?php echo $contact_r['pn1'];?>" class="d-inline-block mb-2 text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn1'];?>
          </a>
          <br>
          <a href="tel: +<?php echo $contact_r['pn2'];?>" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-telephone-fill"></i>+<?php echo $contact_r['pn2'];?>
          </a>
          <h5 class="mt-4">E-mail</h5>
          <a href="<?php echo $contact_r['email'];?>" class="d-inline-block text-decoration-none text-dark">
            <i class="bi bi-envelope-fill me-1"></i>
            <?php echo $contact_r['email'];?>
          </a>
          <h5 class="mt-4">Follow Us</h5>
          <a href="<?php echo $contact_r['tw'];?>" class="d-inline-block text-dark fs-5 me-2 ">
            <i class="bi bi-twitter-x me-1"></i>
          </a>
          <a href="<?php echo $contact_r['fb'];?>" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-facebook me-1"></i>
          </a>
          <a href="<?php echo $contact_r['insta'];?>" class="d-inline-block text-dark fs-5 me-2">
            <i class="bi bi-instagram me-1"></i>
          </a>
          <a href="<?php echo $contact_r['threads'];?>" class="d-inline-block text-dark fs-5">
            <i class="bi bi-threads" me-1></i>
          </a>
        </div>
      </div>
      <div class="col-lg-6 col-md-6 px-4">
        <div class="bg-white rounded shadow p-4">
          <form method="post" id="quirey_s_form">
            <h5>Send a message</h5>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Name</label>
              <input name="name" required type="text" class="form-control shadow-none" autocomplete="name">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Email</label>
              <input name="email" required type="email" class="form-control shadow-none" autocomplete="email">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Subject</label>
              <input name="subject" required type="text" class="form-control shadow-none" autocomplete="off">
            </div>
            <div class="mt-3">
              <label class="form-label" style="font-weight: 500;">Message</label>
              <textarea name="message" required autocomplete="off" class="form-control shadow-none" rows="5" style="resize: none;"></textarea>
            </div>
            <button type="submit" name="send" class="btn text-white custom-bg mt-3" style="background-color: #2ec1ac;">SEND</button>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  if(isset($_POST['send'])){
    $frm_data = filtration(($_POST));

    $q = "INSERT INTO `user_queries`(`name`, `email`, `subject`, `message`) VALUES (?,?,?,?)";
    $values = [$frm_data['name'],$frm_data['email'],$frm_data['subject'],$frm_data['message']];

    $res = insert($q,$values,'ssss');
    if($res==1){
      echo '<div id="alert-message" class="alert alert-success custom-alert">You sent the mail</div>';
    }
    else{
      echo '<div id="alert-message" class="alert alert-danger custom-alert">Server down! Please try again later!</div>';
    }
  }  
  ?>

  <!-- footer -->
  <?php require('inc/footer.php') ?>

  <script>
    window.onload = function() {
      // Check if the alert message exists
      const alertMessage = document.getElementById('alert-message');
      if (alertMessage) {
        // Set a timeout to hide the alert after 3 seconds
        setTimeout(function() {
          alertMessage.style.display = 'none';
        }, 3000); // 3000 milliseconds = 3 seconds
      }

      // Prevent form resubmission on refresh
      if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
      }
    };
  </script>

</body>
</html>
