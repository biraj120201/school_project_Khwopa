// Function to fetch and display the users
function get_users() {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    xhr.onload = function () {
      if (xhr.status == 200) {
        document.getElementById('users-data').innerHTML = xhr.responseText;
      } else {
        alert('Error: Unable to fetch users data');
      }
    };
  
    xhr.onerror = function () {
      alert('Request failed. Please try again.');
    };
  
    xhr.send('get_users');
  }
  
  // Function to toggle the status of a user (active/inactive)
  function toggle_status(id, val) {
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "ajax/users.php", true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
  
    xhr.onload = function () {
        if (xhr.responseText == 1) {
          alert('success', 'Status toggled!');
          get_users();


        } else if (xhr.responseText == '0') {
          alert('Error', 'Server is down or the operation failed!');
        }
    };
  
    xhr.onerror = function () {
      alert('Request failed. Please try again.');
    };
  
    xhr.send('toggle_status=' + id + '&value=' + val);
  }
  

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
    get_users();
}
