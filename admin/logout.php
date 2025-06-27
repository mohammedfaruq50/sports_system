<?php
session_start();

// Destroy all session variables
$_SESSION = [];
session_unset();
session_destroy();

// Redirect to login page (you can change to your home page if needed)
header("Location: ../index.html");
exit();

?>