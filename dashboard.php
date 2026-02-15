<?php 
require 'config/db.php';
if(!isset($_SESSION['user_id'])) { header("Location: login.php"); exit(); }

// SECURITY: If not admin, kick them out to the catalog
if($_SESSION['user_role'] !== 'admin') {
    header("Location: catalog.php");
    exit();
}

include 'partials/header.php';
$items = mysqli_query($conn, "SELECT * FROM products");
?>

<div class="container-fluid mt-4">
    <div class="row g-4">
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-3 text-primary">Admin: Publish Product</h5>
                    <form action="actions/product_action.php" method="POST" enctype="multipart/form-data">
                        <input type="text" name="name" class="form-control mb-2" placeholder="Product Name" required>
                        <textarea name="description" class="form-control mb-2" placeholder="Write description here..." rows="3"></textarea>
                        
                        <div class="input-group mb-2">
                            <input type="number" name="qty" class="form-control" placeholder="Qty" required>
                            <select name="unit" class="form-select">
                                <option value="kg">kg</option><option value="pcs">pcs</option><option value="ltr">ltr</option>
                            </select>
                        </div>
                        <input type="number" step="0.01" name="price" class="form-control mb-3" placeholder="Price/Unit" required>
                        
                        <label class="small text-muted mb-1">Product Image</label>
                        <input type="file" name="image" class="form-control mb-4" accept="image/*" required>
                        
                        <button type="submit" name="add_full" class="btn btn-primary w-100 fw-bold py-2">Save to Warehouse</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-8">
            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">
                    <h5 class="fw-bold mb-4">Live Inventory Management</h5>
                    <table class="table align-middle">
                        <thead class="table-light">
                            <tr><th>Image</th><th>Details</th><th>Stock</th><th>Action</th></tr>
                        </thead>
                        <tbody>
                            <?php while($row = mysqli_fetch_assoc($items)): ?>
                            <tr>
                                <td><img src="uploads/<?= $row['image'] ?>" width="55" height="55" class="rounded shadow-sm"></td>
                                <td>
                                    <strong><?= $row['name'] ?></strong><br>
                                    <span class="text-primary small">$<?= $row['price'] ?></span>
                                </td>
                                <td><?= $row['qty'] ?> <?= $row['unit'] ?></td>
                                <td>
                                    <a href="edit_product.php?id=<?= $row['id'] ?>" class="btn btn-sm btn-warning px-3">Edit</a>
                                    <a href="actions/product_action.php?del=<?= $row['id'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Delete?')">Delete</a>
                                </td>
                            </tr>
                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>