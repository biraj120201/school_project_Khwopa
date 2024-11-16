
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);


require('../inc/db_config.php');
require('../inc/essentials.php');
adminLogin();




if (isset($_POST['get_bookings'])) {
    
    $query = "SELECT * FROM `bookings` WHERE `status` = 'reserved' AND `arrival`=0 ORDER BY `id` ASC";
  $res = mysqli_query($con, $query);
  $i = 1;
  $table_data = "";

  while($data = mysqli_fetch_assoc($res)) {
    $date = date("d-m-Y",strtotime($data['created_at']));
    $checkin = date("d-m-Y",strtotime($data['check_in']));
    $checkout = date("d-m-Y",strtotime($data['check_out']));

    $table_data .= "
    <tr>
        <td>$i</td>
        <td>
            <b>Name:</b> <br>$data[user_name]
            <br>
            <b>Phone No:</b>$data[phone_number]
        </td>
        <td>
            <b>Room:</b> $data[room_name]
            <br>
            <b>Price:</b> $$data[price]
        </td>
        <td>
            <b>Check-in:</b> $checkin
            <br>
            <b>Check-out:</b> $checkout
            <br>
            <b>Paid:</b> $$data[price]  <!-- Ensure this is the correct amount for paid -->
            <br>
            <b>Date:</b> $date
        </td> <!-- Close this <td> properly -->
        <td>
            <button type='button' onclick='assign_room($data[id])' class='btn text-white btn-sm fw-bold custom-bg shadow-none' data-bs-toggle='modal' data-bs-target='#assign-room'>
                <i class='bi bi-check2-square'></i>   
                Assign Room
            </button>
            <br>
            <button type='button' class='mt-2 btn btn-outline-danger btn-sm fw-bold shadow-none' >
                <i class='bi bi-trash'></i>   
                Cancel Booking
            </button>
        </td>
    </tr>
    ";
    $i++;
    
}
echo $table_data;
}
if(isset($_POST['assign_room'])) {

    $frm_data = filtration($_POST);
    $query = "UPDATE bookings SET arrival = ?, room_no=? WHERE user_id = ?";
    $values = [1,$frm_data['room_no'],$user_id];
    $res = update($query,$values,'isi');
}































if (isset($_POST['remove_user'])) {
  $frm_data = filtration($_POST);

  $res = delete("DELETE FROM `user_cred` WHERE `id`=?",[$frm_data['user_id']],'i');
  if($res){
    echo 1;
  }
  else{
    echo 0;
  }

}

if (isset($_POST['search_user'])) {
  $frm_data = filtration($_POST);
  $query = "SELECT * FROM `user_cred` WHERE `name` LIKE ?";

  $res = select($query,["%$frm_data[name]%"],'s');
  $i = 1;
  $path = USERS_IMG_PATH;
  
  $data = "";

  while ($row = mysqli_fetch_assoc($res)) {

    $del_btn = "<button type='button' onclick='remove_user($row[id])' class='btn btn-danger shadow-none btn-sn'>
                <i class='bi bi-trash me-1'></i>
              </button>";
      
    $status = "<button onclick='toggle_status($row[id],0)' class='btn btn-dark btn-sm shadow-none'>active</button>";
    if (!$row['status']) {
      $status = "<button onclick='toggle_status($row[id],1)' class='btn btn-danger btn-sm shadow-none'>inactive</button>";

    }

    $data.="
      <tr>
        <td>$i</td>
        <td>
          <img src='$path$row[profile]' width='55px'>
          <br>
          $row[name]
        </td>
        <td>$row[email]</td>
        <td>$row[phonenum]</td>
        <td>$row[address]</td>
        <td>$row[dob]</td>
        <td>$status</td>
        <td>$row[datentime]</td>
        <td>$del_btn</td>

      </tr>
    ";
    $i++;
  }

  echo $data;
}

?> 