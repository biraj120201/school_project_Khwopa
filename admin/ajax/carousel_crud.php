
<?php


require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();


if (isset($_POST['add_image'])) {
  // Handle the image upload
  $img_r = uploadImage($_FILES['picture'], CAROUSEL_FOLDER);

  // Check for image upload errors
  if ($img_r == 'inv_img' || $img_r == 'inv_size' || $img_r == 'upd_failed') {
    echo $img_r;
  } else {

    // Prepare the insert query
    $q = "INSERT INTO `carousel`(`image`) VALUES (?)";
    $values = [$img_r];

    // Execute the insert function
    $res = insert($q, $values, 's');

    // Return the result of the insert operation
    echo $res;
  }
}
if (isset($_POST['get_carousel']))
 {
  $res = selectAll('carousel');

  while ($row = mysqli_fetch_assoc($res)) 
  {
    $path = CAROUSEL_IMG_PATH;
    echo <<<data
      <div class="col-md-4 mb-3">
        <div class="card bg-dark text-white">
          <img src="$path$row[image]" class="card-img" >
          <div class="card-img-overlay text-end">
            <button type="button" onclick="rem_image($row[sr_no])" class="btn btn-danger btn-sm shadow-none">
              <i class="bi bi-trash3"></i>Delete
            </button>
          </div>
        </div>
      </div>
    data;
  }
}
if(isset($_POST['rem_image'])){
  $frm_data = filtration($_POST);
  $values = [$frm_data['rem_image']];

  $pre_q = "SELECT * FROM `carousel` WHERE `sr_no` =?";
  $res = select($pre_q,$values,'i');
  $img = mysqli_fetch_assoc($res);

  if(deleteImage($img['image'],CAROUSEL_FOLDER)){
    $q = "DELETE FROM `carousel` WHERE `sr_no`=?";
    $res = delete($q,$values,'i');
    echo $res;
  }
  else{
    echo 0;
  }
}



?> 