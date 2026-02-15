<?php 
require 'config/db.php';
include 'partials/header.php';
$uid = $_SESSION['user_id'];
$res = mysqli_query($conn, "SELECT * FROM orders WHERE user_id = $uid ORDER BY order_date DESC");
?>
<div class="container">
    <h2 class="fw-bold mb-4 no-print">My Orders</h2>
    <div class="row g-4">
        <?php while($r = mysqli_fetch_assoc($res)): ?>
        <div class="col-md-6">
            <div class="glass-card p-4">
                <div class="d-flex justify-content-between">
                    <h5 class="fw-bold m-0 text-primary"><?= $r['product_name'] ?></h5>
                    <button onclick="window.print()" class="btn btn-sm btn-outline-secondary no-print">📄 Receipt</button>
                </div>
                <hr>
                <div class="d-flex justify-content-between align-items-end">
                    <div>
                        <div class="h3 fw-bold mb-1">$<?= number_format($r['total_price'], 2) ?></div>
                        <small class="text-muted"><?= $r['order_date'] ?></small>
                    </div>
                    <span class="badge bg-light text-dark border"><?= $r['status'] ?></span>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>
<?php include 'partials/footer.php'; ?>