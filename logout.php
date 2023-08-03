<?php
session_start();

session_destroy();

// Redirect to the index page with the logout message
header('Location: index.php?logoutMessage=Currently logged out.');
exit();
?>
