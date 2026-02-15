<?php 
if (session_status() === PHP_SESSION_NONE) { session_start(); }

// Safety checks: If keys don't exist, set defaults to prevent warnings
$isLoggedIn = isset($_SESSION['user_id']);
$userRole = $_SESSION['user_role'] ?? 'customer'; 
$userName = $_SESSION['user_name'] ?? 'Guest';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InventoryPro Premium</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        :root { --main-grad: linear-gradient(135deg, #667eea 0%, #764ba2 100%); }
        body { background: #f8f9fd; font-family: 'Segoe UI', sans-serif; }
        .navbar-premium { background: var(--main-grad); border-radius: 0 0 20px 20px; box-shadow: 0 4px 15px rgba(0,0,0,0.1); }
        .glass-card { background: white; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); border: none; }
    </style>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark navbar-premium py-3 mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="catalog.php">💎 InventoryPro</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto align-items-center">
                <?php if($isLoggedIn): ?>
                    <li class="nav-item"><a class="nav-link" href="catalog.php">Marketplace</a></li>
                    <li class="nav-item"><a class="nav-link" href="my_orders.php">My Bag</a></li>
                    <?php if($userRole === 'admin'): ?>
                        <li class="nav-item ms-2"><a class="btn btn-warning btn-sm fw-bold px-3 rounded-pill" href="admin_orders.php">Sales Log</a></li>
                    <?php endif; ?>
                    <li class="nav-item ms-4"><a href="actions/logout_action.php" class="btn btn-danger btn-sm px-4 rounded-pill">Logout</a></li>
                <?php else: ?>
                    <li class="nav-item"><a class="btn btn-light btn-sm px-4 rounded-pill" href="login.php">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>