// Function to fetch and display the users
function get_bookings() {
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/new_bookings.php", true);
  xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

  xhr.onload = function () {
    if (xhr.status == 200) {
      document.getElementById('table-data').innerHTML = xhr.responseText;
    } else {
      alert('Error: Unable to fetch users data');
    }
  };
  xhr.send('get_bookings');
}
let assign_room_form = document.getElementById('assign_room_form');

function assign_room(id){
  assign_room_form.elements['id'].value=id;
}
assign_room_form.addEventListener('submit',function(e){
  e.preventDefault();

  let data = new FormData();
  data.append('room_number', assign_room_form.elements['room_no'].value);
  data.append('booking_id',assign_room_form.elements['booking_id'].value);
  data.append('assign_room','');

  let xhr = new XMLHttpRequest();
  xhr.open("post", "ajax/new_bookings.php", true);

  xhr.onload = function() {
      var myModal = document.getElementById('assign-room');
      var modal = bootstrap.Modal.getInstance(myModal);
      modal.hide();
      if(this.responseText == 1){
        alert('success','Room number alloted booking finalize')
        assign_room_form.reset();
        get_bookings();
      }
      else{
        alert('error','server down')
      }

  };
  xhr.send(data);
})

function remove_user(user_id) {
if (confirm("Are you sure, you want to remove this User?")) {
  let data = new FormData();
  data.append('user_id', user_id);
  data.append('remove_user', '');
  let xhr = new XMLHttpRequest();
  xhr.open("POST", "ajax/users.php", true);

  xhr.onload = function () {

    if (this.responseText == 1) {
      alert('success', 'user removed!');
      get_users();
    } else {
      alert('error', 'user removal failed');
    }
  }
  xhr.send(data);
}

}

function search_user(username) {
let xhr = new XMLHttpRequest();
xhr.open("POST", "ajax/users.php", true);
xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

xhr.onload = function () {
  document.getElementById('users-data').innerHTML = xhr.responseText;
}
xhr.send('search_user&name='+username);
}



window.onload = function () {
  get_bookings();
}
