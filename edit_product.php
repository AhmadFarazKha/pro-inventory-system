<?php 
require 'config/db.php';
include 'partials/header.php';

$id = (int)$_GET['id'];
$res = mysqli_query($conn, "SELECT * FROM products WHERE id=$id");
$p = mysqli_fetch_assoc($res);
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body p-4">
                    <h4 class="fw-bold text-warning mb-4">Edit Product Entry</h4>
                    <form action="actions/product_action.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="<?= $p['id'] ?>">
                        
                        <label class="small fw-bold">Product Name</label>
                        <input type="text" name="name" class="form-control mb-3" value="<?= htmlspecialchars($p['name']) ?>" required>
                        
                        <label class="small fw-bold">Full Description</label>
                        <textarea name="description" class="form-control mb-3" rows="3"><?= htmlspecialchars($p['description']) ?></textarea>
                        
                        <div class="row g-2 mb-3">
                            <div class="col-8">
                                <label class="small fw-bold">Stock Quantity</label>
                                <input type="number" name="qty" class="form-control" value="<?= $p['qty'] ?>" required>
                            </div>
                            <div class="col-4">
                                <label class="small fw-bold">Unit</label>
                                <select name="unit" class="form-select">
                                    <option value="kg" <?= $p['unit']=='kg'?'selected':'' ?>>kg</option>
                                    <option value="pcs" <?= $p['unit']=='pcs'?'selected':'' ?>>pcs</option>
                                    <option value="ltr" <?= $p['unit']=='ltr'?'selected':'' ?>>ltr</option>
                                </select>
                            </div>
                        </div>

                        <label class="small fw-bold">Price per Unit ($)</label>
                        <input type="number" step="0.01" name="price" class="form-control mb-4" value="<?= $p['price'] ?>" required>
                        
                        <div class="mb-4 text-center bg-light p-3 rounded shadow-inner">
                            <label class="small fw-bold d-block mb-2">Current Image</label>
                            <img src="uploads/<?= $p['image'] ?>" width="120" class="rounded shadow-sm mb-3">
                            <input type="file" name="image" class="form-control" accept="image/*">
                            <small class="text-muted mt-2 d-block">Only upload if you want to change the picture.</small>
                        </div>

                        <div class="d-flex gap-2">
                            <a href="dashboard.php" class="btn btn-light w-100">Cancel</a>
                            <button type="submit" name="update_full" class="btn btn-warning w-100 fw-bold">Update Product</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'partials/footer.php'; ?>