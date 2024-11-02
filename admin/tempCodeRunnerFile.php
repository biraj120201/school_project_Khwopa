<?php require('inc/essentials.php');
include('inc/scripts.php');
adminLogin();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>settings page</title>
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
          <h3 class="m-b-4">SETTINGS</h3>

          <!-- general settings section-->
          <div class="card border-0 shadow-sm mb-4">
            <div class="card-body">
              <div class="d-flex align-items-center justify-content-between mb-3">
                <h5 class="card-title m-0">GENERAL SETTING</h5>
                <!-- Button trigger modal -->
                <button type="button" class="btn btn-dark shadow-none btn-sn" data-bs-toggle="modal" data-bs-target="#general-s">
                  <i class="bi bi-pencil-square me-1"></i>EDIT
                </button>
              </div>
              <h6 class="card-subtitle mb-1 fw-bold">SITE TITLE</h6>
              <p class="card-text" id="site_title"></p>
              <h6 class="card-subtitle mb-1 fw-bold">ABOUT US</h6>
              <p class="card-text" id="site_about"></p>
            </div>
          </div>

          <!--general settings Modal -->
          <div class="modal fade" id="general-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
              <form id="general_s_form">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">GENERAL SETTINGS</h5>
                  </div>
                  <div class="modal-body">
                    <div class="mb-3">
                      <label class="form-label fw-bold">SITE TITLE</label>
                      <input type="text" name="site_title" id="site_title_inp" class="form-control shadow-none" required>
                    </div>
                    <div class=" mb-3">
                      <label class="form-label fw-bold">About us</label>
                      <textarea name="site_about" id="site_about_inp" class="form-control shadow-none" rows="6" required></textarea>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="site_title.value = general_data.site_title, site_about.value = general_data.site_about" class="btn text-secondary text-dark shadow-none custom-bg" data-bs-dismiss="modal">CANCEL</button>
                    <button type="sumbit" onclick="" class="btn text-secondary text-dark shadow-none custom-bg">SUBMIT</button>
                  </div>
              </form>
            </div>
          </div>
        </div>
        <!-- shut down section  -->

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">shut down website</h5>
              <div class="form-check form-switch">
                <form action="">
                  <input onchange="upd_shutdown(this.value)" class="form-check-input" type="checkbox" id="shutdown-toggle">
                </form>

              </div>
            </div>
            <p class="card-text">
              NO costumer will be able to book and pay when the page is shut down.
            </p>
          </div>
        </div>
        <!-- contact details section -->

        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">contact SETTING</h5>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-dark shadow-none btn-sn" data-bs-toggle="modal" data-bs-target="#contacts-s">
                <i class="bi bi-pencil-square me-1"></i>EDIT
              </button>
            </div>
            <div class="row">
              <div class="col-lg-6">
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">address</h6>
                  <p class="card-text" id="address"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-1 fw-bold">google map</h6>
                  <p class="card-text" id="gmap"></p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-4 fw-bold">phone numbers</h6>
                  <p class="card-text mb-4">
                    <i class="bi bi-telephone-fill "></i>
                    <span id="pn1"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-telephone-fill mb-1"></i>
                    <span id="pn2"></span>
                  </p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-4 fw-bold">e-mail</h6>
                  <p class="card-text" id="email"></p>
                </div>
              </div>
              <div class="col-lg-6">
                <div class="mb-4">
                  <h6 class="card-subtitle mb-4 fw-bold">social links</h6>
                  <p class="card-text mb-4">
                    <i class="bi bi-twitter-x me-1"></i>
                    <span id="tw"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-facebook me-1"></i>
                    <span id="fb"></span>
                  </p>
                  <p class="card-text mb-4">
                    <i class="bi bi-instagram me-1"></i>
                    <span id="insta"></span>
                  </p>
                  <p class="card-text">
                    <i class="bi bi-threads" me-1></i>
                    <span id="threads"></span>
                  </p>
                </div>
                <div class="mb-4">
                  <h6 class="card-subtitle mb-4 fw-bold">I frame</h6>
                  <iframe id="iframe" class="border p-2 w-100" loading="lazy"></iframe>
                </div>
              </div>
            </div>

          </div>
        </div>


        <!--contacts detail modal settings -->
        <div class="modal fade" id="contacts-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <form id="contacts_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">CONTACT SETTINGS</h5>
                </div>
                <div class="modal-body">
                  <div class="container-fluid p-0">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">ADDRESS</label>
                          <input type="text" name="address" id="address_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">GOOGLE MAP LINK</label>
                          <input type="text" name="gmap" id="gmap_inp" class="form-control shadow-none" required>
                        </div>
                        <div class="mb-3">
                          <label class="form-label fw-bold">PHONE NUMBER(with country code)</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill "></i></span>
                            <input type="text" name="pn1" id="pn1_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-telephone-fill "></i></span>
                            <input type="text" name="pn2" id="pn2_inp" class="form-control shadow-none">
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-bold">Email</label>
                            <input type="email" name="email" id="email_inp" class="form-control shadow-none" required>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="mb-3">
                          <label class="form-label fw-bold">SOCIAL LINKS</label>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-twitter-x me-1"></i></span>
                            <input type="text" name="tw" id="tw_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-facebook me-1"></i></span>
                            <input type="text" name="fb" id="fb_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"> <i class="bi bi-instagram me-1"></i></span>
                            <input type="text" name="insta" id="insta_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="input-group mb-3">
                            <span class="input-group-text"><i class="bi bi-threads" me-1></i></span>
                            <input type="text" name="threads" id="threads_inp" class="form-control shadow-none" required>
                          </div>
                          <div class="mb-3">
                            <label class="form-label fw-bold">IFRAME</label>
                            <input type="text" name="iframe" id="iframe_inp" class="form-control shadow-none" required>
                          </div>

                        </div>
                      </div>
                    </div>

                  </div>
                  <div class="modal-footer">
                    <button type="button" onclick="contacts_inp(contacts_data)" class="btn text-secondary text-dark shadow-none custom-bg" data-bs-dismiss="modal">CANCEL</button>
                    <button type="submit" onclick="" class="btn text-secondary text-dark shadow-none custom-bg">SUBMIT</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>



        <!-- managemet teams section-->
        <div class="card border-0 shadow-sm mb-4">
          <div class="card-body">
            <div class="d-flex align-items-center justify-content-between mb-3">
              <h5 class="card-title m-0">managemet teams</h5>
              <!-- Button trigger modal -->
              <button type="button" class="btn btn-dark shadow-none btn-sn" data-bs-toggle="modal" data-bs-target="#team-s">
                <i class="bi bi-plus-square me-1"></i>ADD
              </button>
            </div>

            <div class="row" id="team-data">

              <?php echo $_SERVER['DOCUMENT_ROOT']. '/school_project/pictures/' ?>


            </div>
          </div>
        </div>


        <!-- managemet teams modal  -->

        <div class="modal fade" id="team-s" data-bs-backdrop="static" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form id="team_s_form">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">add team member</h5>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label fw-bold">Name</label>
                    <input type="text" name="member_name" id="member_name_inp" class="form-control shadow-none" required>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label fw-bold">Picture</label>
                    <input type="file" name="member_picture" id="member_picture_inp" accept=".jpg, .png, .webp, .jpeg" class="form-control shadow-none" required>

                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn text-secondary text-dark shadow-none custom-bg" data-bs-dismiss="modal">CANCEL</button>
                  <button type="submit" class="btn text-secondary text-dark shadow-none custom-bg">SUBMIT</button>
                </div>
            </form>
          </div>
        </div>







      </div>
    </div>
  </div>





  <?php require('inc/links.php'); ?>
  <!--ajax code -->
  <script>
    let general_data, contacts_data;

    let general_s_form = document.getElementById('general_s_form');
    let site_title_inp = document.getElementById('site_title_inp');
    let site_about_inp = document.getElementById('site_about_inp');

    let contacts_s_form = document.getElementById('contacts_s_form');

    let team_s_form = document.getElementById('team_s_form');
    let member_name_inp = document.getElementById('member_name_inp');
    let member_picture_inp = document.getElementById('member_picture_inp');



    function get_general() {
      let site_title = document.getElementById('site_title');
      let site_about = document.getElementById('site_about');




      let shutdown_toggle = document.getElementById('shutdown-toggle');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        general_data = JSON.parse(this.responseText);
        site_title.innerText = general_data.site_title;
        site_about.innerText = general_data.site_about;

        site_title_inp.value = general_data.site_title;
        site_about_inp.value = general_data.site_about;

        if (general_data.shutdown == 0) {
          shutdown_toggle.checked = false;
          shutdown_toggle.value = 0;
        } else {
          shutdown_toggle.checked = true;
          shutdown_toggle.value = 1;
        }
      }
      xhr.send('get_general');
    }


    general_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_general(site_title_inp.value, site_about_inp.value);
    })


    function upd_general(site_title_val, site_about_val) {
      let xhr = new XMLHttpRequest();
      xhr.open("post", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {

        var myModal = document.getElementById('general-s')
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
          alert('success', 'changes saved!');
          get_general();
        } else {
          alert('error', 'No changes saved!');
        }

      }
      xhr.send('site_title=' + site_title_val + '&site_about=' + site_about_val + '&upd_general');
    }
    // shut down function 
    function upd_shutdown(val) {
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        if (this.responseText == 1 && general_data.shutdown == 0) {
          alert('Success', 'Shutdown mode onn!');
        } else {
          alert('success', 'shutdown mode off!');
        }
        get_general(); // Refresh the general settings
      }
      xhr.send('upd_shutdown=' + val);
    }

    function get_contacts() {
      let contacts_p_id = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta', 'threads'];
      let iframe = document.getElementById('iframe');

      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        contacts_data = JSON.parse(this.responseText);
        contacts_data = Object.values(contacts_data);

        for (i = 0; i < contacts_p_id.length; i++) {
          document.getElementById(contacts_p_id[i]).innerText = contacts_data[i + 1];
        }
        iframe.src = contacts_data[10];
        contacts_inp(contacts_data);
      }
      xhr.send('get_contacts');
    }

    function contacts_inp(data) {
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp', 'threads_inp', 'iframe_inp'];

      for (i = 0; i < contacts_inp_id.length; i++) {
        document.getElementById(contacts_inp_id[i]).value = data[i + 1];
      }
    }
    contacts_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      upd_contacts();
    })

    function upd_contacts() {
      let index = ['address', 'gmap', 'pn1', 'pn2', 'email', 'tw', 'fb', 'insta', 'threads', 'iframe'];
      let contacts_inp_id = ['address_inp', 'gmap_inp', 'pn1_inp', 'pn2_inp', 'email_inp', 'tw_inp', 'fb_inp', 'insta_inp', 'threads_inp', 'iframe_inp']

      let data_str = "";

      for (i = 0; i < index.length; i++) {
        data_str += index[i] + "=" + document.getElementById(contacts_inp_id[i]).value + '&';
      }
      data_str += "upd_contacts";
      let xhr = new XMLHttpRequest();
      xhr.open("POST", "ajax/settings_crud.php", true);
      xhr.setRequestHeader('content-type', 'application/x-www-form-urlencoded');

      xhr.setRequestHeader('content-Type', 'application/x-www-form-urlencoded');

      xhr.onload = function() {
        var myModal = document.getElementById('contacts-s')
        var modal = bootstrap.Modal.getInstance(myModal);
        modal.hide();
        if (this.responseText == 1) {
          alert('success', 'Changes saved!');
          get_contacts();
        } else {
          alert('warning', 'No changes done!');
        }
      }
      xhr.send(data_str);
    }

    team_s_form.addEventListener('submit', function(e) {
      e.preventDefault();
      add_member();
    });

    function add_member() {
      let data = new FormData();
      data.append('name', member_name_inp.value);
      data.append('picture', member_picture_inp.files[0]); // Ensure this key matches
      data.append('add_member', '');

      let xhr = new XMLHttpRequest();
      xhr.open("post", "ajax/settings_crud.php", true);

      xhr.onload = function() {
         console.log(this.responseText);
        // if (this.responseText === '1') { // Adjust based on what your PHP returns
        //   alert('Success', 'Member added successfully!');
        //   // Optionally refresh or update the UI
        // } else {
        //   alert('Error', this.responseText); // Display the error message
        // }
      };
      xhr.send(data);
    }

    window.onload = function() {
      get_general();
      get_contacts();
    }
  </script>
</body>

</html>