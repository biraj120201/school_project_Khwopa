<?php
//frontend purpose data
define('SITE_URL', 'http://127.0.0.1:81/school_project');
define('ABOUT_IMG_PATH',SITE_URL.'/pictures/about/');
define('CAROUSEL_IMG_PATH',SITE_URL.'/pictures/carousel/');
define('FEATURES_IMG_PATH',SITE_URL.'/pictures/features/');//this file is to select svg image for facilities.facilities images are stored in features file
define('ROOMS_IMG_PATH',SITE_URL.'/pictures/rooms/');





//backend upload process needs this data
define('UPLOAD_IMAGE_PATH', $_SERVER['DOCUMENT_ROOT'] . '/school_project/pictures/');
define('ABOUT_FOLDER', 'about/'); // Update this line
define('CAROUSEL_FOLDER','carousel/');
define('FEATURES_FOLDER','features/');//it upload facilities. facilities images are stored in features file
define('ROOMS_FOLDER','rooms/');


function adminLogin()
{
  session_start();
  if (!(isset($_SESSION['adminLogin']) && $_SESSION['adminLogin'] == true)) {
    echo "
      <script>window.location.href='index.php'
    </script>";
    exit;
  }
}

function redirect($url)
{
  echo "
      <script>window.location.href='$url';
    </script>";
  exit;
}

function alert($type, $msg)
{
  // Handle different alert types
  $valid_types = ["success", "danger", "warning", "info"];
  $bs_class = in_array($type, $valid_types) ? "alert-$type" : "alert-danger"; // Default to danger if invalid type

  echo <<<alert
      <div class="alert $bs_class alert-dismissible fade show custom-alert" role="alert">
        <strong class="me-3">$msg</strong> 
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    alert;
}

// HOLY SHIT! WHO THE FUCK ARE YOU AND WHAT ARE YOU DOING HERE.


function uploadImage($image, $folder)
{
    $valid_mime = ['image/jpeg', 'image/png', 'image/webp'];
    $img_mime = $image['type'];

    // Check for valid MIME type
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type
    }

    // Check for valid file size (max 2 MB)
    if ($image['size'] > (2 * 1024 * 1024)) {
        return 'inv_size'; // Invalid size greater than 2 MB
    }

    // Generate a random file name
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

    // Create the full path for the image
    $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

    // Move the uploaded file
    if (move_uploaded_file($image['tmp_name'], $img_path)) {
        return $rname; // Return the new file name on success
    } else {
        return 'upd_failed'; // File upload failed
    }
}
function deleteImage($image, $folder){
  $filePath = UPLOAD_IMAGE_PATH . $folder . $image;
  if (file_exists($filePath) && unlink($filePath)) {
      return true;
  } else {
      return false; // File does not exist or deletion failed
  }
}




function uploadSVGImage($image, $folder)
{
    $valid_mime = ['image/svg+xml'];
    $img_mime = $image['type'];

    // Check for valid MIME type
    if (!in_array($img_mime, $valid_mime)) {
        return 'inv_img'; // Invalid image MIME type
    }

    // Check for valid file size (max 2 MB)
    if ($image['size'] > (2 * 1024 * 1024)) {
        return 'inv_size'; // Invalid size greater than 2 MB
    }

    // Generate a random file name
    $ext = pathinfo($image['name'], PATHINFO_EXTENSION);
    $rname = 'IMG_' . random_int(11111, 99999) . ".$ext";

    // Create the full path for the image
    $img_path = UPLOAD_IMAGE_PATH . $folder . $rname;

    // Move the uploaded file
    if (move_uploaded_file($image['tmp_name'], $img_path)) {
        return $rname; // Return the new file name on success
    } else {
        return 'upd_failed'; // File upload failed
    }
}



?>
