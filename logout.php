<?php
// Include the essentials file (make sure redirect() is defined in it)
require('admin/inc/essentials.php');

// Start the session (this is necessary before accessing or modifying session data)
session_start();

// Unset all session variables to clear session data
session_unset();

// Destroy the session
session_destroy();

// Optionally, you can also unset the session cookie (for added security) by setting its expiry to a past date
setcookie(session_name(), '', time() - 3600, '/');

// Redirect the user to the homepage (index.php)
redirect('index.php');
?>
