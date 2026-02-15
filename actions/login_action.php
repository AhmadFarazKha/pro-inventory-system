<?php
require '../config/db.php';
session_start();

if (isset($_POST['login'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email='$email'");
    
    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $user['password'])) {
            // SETTING ALL SESSION DATA Corrected
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_name'] = $user['name']; // This fixes the Catalog warning
            $_SESSION['user_role'] = $user['role']; // admin or customer

            // Redirect based on role
            if ($user['role'] == 'admin') {
                header("Location: ../dashboard.php");
            } else {
                header("Location: ../catalog.php");
            }
            exit();
        } else {
            header("Location: ../login.php?error=Incorrect Password");
        }
    } else {
        header("Location: ../login.php?error=Email not registered");
    }
}
?>