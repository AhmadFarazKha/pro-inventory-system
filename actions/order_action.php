<?php
require '../config/db.php';
session_start();

if (isset($_POST['buy_now']) && isset($_SESSION['user_id'])) {
    $uid = $_SESSION['user_id'];
    $pid = (int)$_POST['product_id'];

    $p_res = mysqli_query($conn, "SELECT * FROM products WHERE id = $pid");
    $p = mysqli_fetch_assoc($p_res);

    if ($p && $p['qty'] > 0) {
        $pname = mysqli_real_escape_string($conn, $p['name']);
        $price = $p['price'];

        $sql = "INSERT INTO orders (user_id, product_id, product_name, quantity, total_price) 
                VALUES ($uid, $pid, '$pname', 1, $price)";
        
        if (mysqli_query($conn, $sql)) {
            // Subtract stock automatically
            mysqli_query($conn, "UPDATE products SET qty = qty - 1 WHERE id = $pid");
            header("Location: ../my_orders.php?status=success");
        }
    }
}
?>