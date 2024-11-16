  <!-- footer -->

  <div class="container-fluid bg-white mt-5">
    <div class="row">
      <div class="col-lg-4 p-4">
        <h3 class="h-font fw-bold fs-3 mb-2"><?php echo $settings_r['site_title']; ?></h3>
        <p>
          <?php echo $settings_r['site_about']; ?>
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
        <a href="<?php echo $contact_r['tw']; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-twitter-x me-1"></i>Twitter-X
        </a><br>
        <a href="<?php echo $contact_r['fb']; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-facebook me-1 "></i>Facebook
        </a><br>
        <a href="<?php echo $contact_r['insta']; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none mb-2">
          <i class="bi bi-instagram me-1 "></i>Instagram
        </a><br>
        <a href="<?php echo $contact_r['threads']; ?>" target="_blank" class="d-inline-block text-dark text-decoration-none">
          <i class="bi bi-threads me-1"></i>Threads
        </a><br>


      </div>
    </div>
  </div>


  <h6 class="text-center bg-dark text-white p-3 m-0">Designed and Developed by <br> <b> Group SDNF </b></h6>
  <script>
    // Code for alert message
    function alert(type, msg, position = 'body') {
      const bs_class = (type === "success") ? 'alert-success' : 'alert-danger';
      let element = document.createElement('div');
      element.classList.add('custom-alert'); // Ensure this class is added
      element.innerHTML = `
    <div class="alert ${bs_class} alert-dismissible fade show" role="alert">
      <strong class="me-3">${msg}</strong> 
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>`;
      document.body.append(element);
      // Auto-dismiss after 3 seconds
      setTimeout(() => {
        element.querySelector('.alert').classList.remove('show');
        element.remove();
      }, 3000);
    }

    // Function to set active class for navbar links
    function setActive() {
      let navbar = document.getElementById('nav-bar');
      let a_tags = navbar.getElementsByTagName('a');

      for (let i = 0; i < a_tags.length; i++) {
        let file = a_tags[i].href.split('/').pop();
        let file_name = file.split('.')[0];

        if (document.location.href.indexOf(file_name) >= 0) {
          a_tags[i].classList.add('active');
        }
      }
    }



    // Register form submit handler
    let register_form = document.getElementById('register-form');

    register_form.addEventListener('submit', (e) => {
      e.preventDefault();

      let data = new FormData();

      // Gather form data
      data.append('name', register_form.elements['name'].value);
      data.append('email', register_form.elements['email'].value);
      data.append('phonenum', register_form.elements['phonenum'].value);
      data.append('address', register_form.elements['address'].value);
      data.append('pincode', register_form.elements['pincode'].value);
      data.append('dob', register_form.elements['dob'].value);
      data.append('pass', register_form.elements['pass'].value);
      data.append('cpass', register_form.elements['cpass'].value);
      data.append('profile', register_form.elements['profile'].files[0]);
      data.append('register', '');

      // Hide the modal (corrected)
      var myModal = document.getElementById('registerModal'); // Referencing the correct modal
      var modal = bootstrap.Modal.getInstance(myModal); // Get instance of modal
      modal.hide(); // Hide the modal

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/login_register.php", true);

      xhr.onload = function() {
        console.log("biraj");
        if (this.responseText == 'pass_missmatch') {
          alert('error', 'Password mismatch');
        } else if (this.responseText == 'email_already') {
          alert('error', 'Your email already exists');
        } else if (this.responseText == 'phone_already') {
          alert('error', 'Your phone number already exists');
        } else if (this.responseText == 'inv_img') {
          alert('error', 'Invalid image format');
        } else if (this.responseText == 'upd_failed') {
          alert('error', 'Image upload failed');
        } else if (this.responseText == 'ins_failed') {
          alert('error', 'Registration failed');
        } else {
          alert('success', 'Registration successful');
          register_form.reset();
        }
      };

      xhr.send(data); // Send the form data via AJAX
    });

    let login_form = document.getElementById('login-form');

    login_form.addEventListener('submit', (e) => {
      e.preventDefault();

      let data = new FormData();

      // Gather form data
      data.append('email_mob', login_form.elements['email_mob'].value);
      data.append('pass', login_form.elements['pass'].value);
      data.append('login', '');

      // Hide the modal (corrected)
      var myModal = document.getElementById('loginModal'); // Referencing the correct modal
      var modal = bootstrap.Modal.getInstance(myModal); // Get instance of modal
      modal.hide(); // Hide the modal

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/login.php", true);

      xhr.onload = function() {
        if (this.responseText == 'inv_email_mob') {
          alert('error', 'Invalid email or mobile number');
        } else if (this.responseText == 'inactive') {
          alert('error', 'Your are Inactive');
        } else if (this.responseText == 'invalid_pass') {
          alert('error', 'Your Password is incorrect');
        } else {
          let fileurl = window.location.href.split('/').pop().split('?').shift();
          if(fileurl== 'room_details.php'){
            window.location =window.location.href;
          }
          else{
          window.location = window.location.pathname;
          }
        }
      }

      xhr.send(data); // Send the form data via AJAX
    });
    
    function checkLoginToBook(status,room_id){
      if(status){
        window.location.href='confirm_booking.php?id='+room_id;
      }
      else{
        alert('error','Please login to book room');
      }
    }
    setActive();
  </script>


   <!-- Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>