<?php
session_start();
session_unset();
session_destroy();

// Redirect back to login page
// Note: ../ means go back one folder to find login.php
header("Location: ../login.php");
exit();
?>