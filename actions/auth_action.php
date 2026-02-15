<?php
require '../config/db.php';

// REGISTER LOGIC
if(isset($_POST['register'])){
    $u = mysqli_real_escape_string($conn, $_POST['user']);
    $p = password_hash($_POST['pass'], PASSWORD_DEFAULT);

    // FIX: Check if user exists first to prevent "Duplicate Entry" crash
    $check = mysqli_query($conn, "SELECT * FROM users WHERE username='$u'");
    if(mysqli_num_rows($check) > 0) {
        die("Error: This username is already taken. Please go back and choose another.");
    }

    mysqli_query($conn, "INSERT INTO users (username, password) VALUES ('$u', '$p')");
    header("Location: ../login.php?msg=success");
}

// LOGIN LOGIC
if(isset($_POST['login_user'])){
    $u = mysqli_real_escape_string($conn, $_POST['user']);
    $p = $_POST['pass'];

    $res = mysqli_query($conn, "SELECT * FROM users WHERE username='$u'");
    $user = mysqli_fetch_assoc($res);

    if($user && password_verify($p, $user['password'])){
        $_SESSION['user_id'] = $user['id'];
        header("Location: ../dashboard.php");
    } else {
        header("Location: ../login.php?error=1");
    }
}

// LOGOUT
if(isset($_GET['logout'])){ session_destroy(); header("Location: ../login.php"); }
?>