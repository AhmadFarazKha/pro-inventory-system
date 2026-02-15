<?php 
require 'config/db.php';
include 'partials/header.php';

if(!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Your Contact Information
$my_phone = "923045979885";
$my_name = "Ahmad Faraz Khan Niazi";

$query = "SELECT * FROM products WHERE qty > 0";
$result = mysqli_query($conn, $query);
?>

<div class="container mt-5">
    <div class="glass-card p-5 mb-5 text-center text-white" style="background: var(--main-grad);">
        <h1 class="display-4 fw-bold"><?= $my_name ?>'s Official Store</h1>
        <p class="lead">Premium Collection | Contact: +<?= $my_phone ?></p>
    </div>

    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php if (mysqli_num_rows($result) > 0): 
            while($p = mysqli_fetch_assoc($result)): 
                // Create a dynamic WhatsApp link
                $whatsapp_msg = urlencode("Hello $my_name, I am interested in buying: " . $p['name']);
                $whatsapp_url = "https://wa.me/$my_phone?text=$whatsapp_msg";
        ?>
            <div class="col">
                <div class="card h-100 glass-card p-3 border-0 shadow-sm">
                    <img src="uploads/<?= $p['image'] ?>" class="card-img-top rounded" style="height: 220px; object-fit: cover;">
                    
                    <div class="card-body text-center">
                        <h5 class="fw-bold text-dark"><?= htmlspecialchars($p['name']) ?></h5>
                        <div class="h3 text-primary fw-bold mb-3">$<?= number_format($p['price'], 2) ?></div>
                        
                        <form action="actions/order_action.php" method="POST" class="mb-2">
                            <input type="hidden" name="product_id" value="<?= $p['id'] ?>">
                            <button type="submit" name="buy_now" class="btn btn-dark w-100 rounded-pill fw-bold">Add to Bag</button>
                        </form>

                        <a href="<?= $whatsapp_url ?>" target="_blank" class="btn btn-success w-100 rounded-pill fw-bold">
                            <i class="fab fa-whatsapp"></i> Buy via WhatsApp
                        </a>
                        
                        <div class="mt-2 text-muted small">In Stock: <?= $p['qty'] ?></div>
                    </div>
                </div>
            </div>
        <?php endwhile; else: ?>
            <div class="col-12 text-center py-5">
                <h3 class="text-muted">My store is currently being restocked. Check back soon!</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php include 'partials/footer.php'; ?>