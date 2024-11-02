  <!-- footer  -->
  <div class="container-fluid bg-white mt-5">
    <div class="row">
      <div class="col-lg-4 p-4">
        <h3 class="h-font fw-bold fs-3 mb-2">Hotel Riddhi Siddhi</h3>
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Est nesciunt, alias, hic asperiores error earum repudiandae perferendis porro nihil quos similique, possimus
          odit non?
          Iure maxime fuga totam unde velit?
        </p>
      </div>
      <div class="col-lg-4 p-4">
        <h5 class="mb-3">Links</h5>
        <a href="index.php" class="d-inline-block mb-2 text-dark text-decoration-none">Home</a><br>
        <a href="rooms.php" class="d-inline-block mb-2 text-dark text-decoration-none">Rooms</a><br>
        <a href="facilities.php" class="d-inline-block mb-2 text-dark text-decoration-none">Facilities</a><br>
        <a href="contact.php" class="d-inline-block mb-2 text-dark text-decoration-none"> Contact Us</a><br>
        <a href="about.php" class="d-inline-block mb-2 text-dark text-decoration-none">About Us</a><br>
      </div>
      <div class="col-lg-4 p-4">
        <h5 class="mb-3">Follow us</h5>
        <a href="<?php echo $contact_r['tw'];?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-twitter-x me-1"></i>Twitter-X
        </a><br>
        <a href="<?php echo $contact_r['fb'];?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-facebook me-1 "></i>Facebook
        </a><br>
        <a href="<?php echo $contact_r['insta'];?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-instagram me-1 "></i>Instagram
        </a><br>
        <a href="<?php echo $contact_r['threads'];?>" target="_blank" class="d-inline-block text-dark text-decoration-none">
          <i class="bi bi-threads me-1"></i>Threads
        </a><br>


      </div>
    </div>
  </div>


  <h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by <br> <b></b> Group SDNF <b></b></h6>



  <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
    <script>
      function setActive(){
        let navbar = document.getElementById('nav-bar');
        let a_tags = navbar.getElementsByTagName('a');

        for(i=0; i<a_tags.length; i++){
          let file = a_tags[i].href.split('/').pop();
          let file_name = file.split('.')[0];

          if(document.location.href.indexOf(file_name)>=0){
            a_tags[i].classList.add('active');
          }
        }
      }
      setActive();
    </script>