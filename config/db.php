<?php
session_start();
$conn = mysqli_connect("localhost", "root", "", "pro_inventory");
if (!$conn) { die("Database Connection Failed"); }
?>