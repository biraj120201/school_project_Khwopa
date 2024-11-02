
<?php


require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();



if (isset($_POST['add_feature'])) {
  $frm_data = filtration($_POST);
  $q = "INSERT INTO `features`(`name`) VALUES (?)";

  $values = [$frm_data['name']];

  // Execute the insert function
  $res = insert($q, $values, 's');

  // Return the result of the insert operation
  echo $res;
}
if (isset($_POST['get_features'])) {
  $res = selectAll('features');
  $i = 1;

  while ($row = mysqli_fetch_assoc($res)) {
    echo <<<data
        <tr>
          <td>$i</td>
          <td>$row[name]</td>
          <td>
            <button type="button" onclick="rem_feature($row[id])" class="btn btn-danger btn-sm shadow-none">
              <i class="bi bi-trash3"></i>Delete
            </button>
          </td>
        </tr>
    data;
    $i++;
  }
}
if (isset($_POST['rem_feature'])) {
  $frm_data = filtration($_POST);
  $values = [$frm_data['rem_feature']];

  $check_q = select('SELECT * FROM `room_features` WHERE `features_id`=?', [$frm_data['rem_feature']], 'i');
  if (mysqli_num_rows($check_q) == 0) {
    $q = "DELETE FROM `features` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
  } else {
    echo 'room_added';
  }
}

if (isset($_POST['add_facility'])) {
  $frm_data = filtration($_POST);
  // Handle the image upload
  $img_r = uploadSVGImage($_FILES['icon'], FEATURES_FOLDER);

  // Check for image upload errors
  if ($img_r == 'inv_img' || $img_r == 'inv_size' || $img_r == 'upd_failed') {
    echo $img_r;
  } else {

    // Prepare the insert query
    $q = "INSERT INTO `facilities`(`icon`, `name`, `description`) VALUES (?, ?,?)";
    $values = [$img_r, $frm_data['name'], $frm_data['desc']];

    // Execute the insert function
    $res = insert($q, $values, 'sss');

    // Return the result of the insert operation
    echo $res;
  }
}


if (isset($_POST['get_facilities'])) {
  $res = selectAll('facilities');
  $i = 1;
  $path = FEATURES_IMG_PATH;

  while ($row = mysqli_fetch_assoc($res)) {
    echo <<<data
        <tr class='align-middle'>
          <td>$i</td>
          <td><img src="$path$row[icon]" width="100px"></td>
          <td>$row[name]</td>
          <td>$row[description]</td>
          <td>
            <button type="button" onclick="rem_facility($row[id])" class="btn btn-danger btn-sm shadow-none">
              <i class="bi bi-trash3"></i>Delete
            </button>
          </td>
        </tr>
    data;
    $i++;
  }
}



if (isset($_POST['rem_facility'])) {
  $frm_data = filtration($_POST);
  $values = [$frm_data['rem_facility']];

  $check_q = select('SELECT * FROM `room_facilities` WHERE `facilities_id`=?', [$frm_data['rem_facility']], 'i');

  if(mysqli_num_rows($check_q)==0){
      $pre_q = "SELECT * FROM `facilities` WHERE `id` =?";
  $res = select($pre_q, $values, 'i');
  $img = mysqli_fetch_assoc($res);

  if (deleteImage($img['icon'], FEATURES_FOLDER)) {
    $q = "DELETE FROM `facilities` WHERE `id` =?";
    $res = delete($q, $values, 'i');
    echo $res;
  } else {
    echo 0;
  }

  }
  else{
    echo 'room_added';
  }

}
?> 