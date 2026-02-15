<?php 
require 'config/db.php';
include 'partials/header.php';
if($userRole !== 'admin') { header("Location: catalog.php"); exit(); }

if(isset($_GET['complete_id'])) {
    $id = (int)$_GET['complete_id'];
    mysqli_query($conn, "UPDATE orders SET status='Completed' WHERE id=$id");
    header("Location: admin_orders.php");
}

$rev = mysqli_fetch_assoc(mysqli_query($conn, "SELECT SUM(total_price) as total FROM orders WHERE status='Completed'"));
$orders = mysqli_query($conn, "SELECT orders.*, users.name FROM orders JOIN users ON orders.user_id = users.id ORDER BY order_date DESC");
?>
<div class="container">
    <div class="row mb-4">
        <div class="col-md-4">
            <div class="glass-card p-4 text-center border-start border-5 border-success">
                <h6 class="text-muted fw-bold small">TOTAL EARNINGS</h6>
                <h1 class="fw-bold text-success">$<?= number_format($rev['total'] ?? 0, 2) ?></h1>
            </div>
        </div>
    </div>
    <div class="glass-card p-4">
        <h4 class="fw-bold mb-4">Orders Management</h4>
        <table class="table table-hover align-middle">
            <thead><tr><th>Customer</th><th>Product</th><th>Revenue</th><th>Status</th><th>Action</th></tr></thead>
            <tbody>
                <?php while($r = mysqli_fetch_assoc($orders)): ?>
                <tr>
                    <td><strong><?= htmlspecialchars($r['name']) ?></strong></td>
                    <td><?= htmlspecialchars($r['product_name']) ?></td>
                    <td class="fw-bold">$<?= number_format($r['total_price'], 2) ?></td>
                    <td><span class="badge rounded-pill <?= $r['status']=='Pending'?'bg-warning text-dark':'bg-success' ?>"><?= $r['status'] ?></span></td>
                    <td>
                        <?php if($r['status']=='Pending'): ?>
                            <a href="admin_orders.php?complete_id=<?= $r['id'] ?>" class="btn btn-sm btn-primary rounded-pill px-3">Complete</a>
                        <?php else: ?>
                            <span class="text-muted small">Done ✅</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>
<?php include 'partials/footer.php'; ?>