<?php include 'partials/header.php'; ?>
<div class="row justify-content-center">
    <div class="col-md-4 card p-4 shadow-sm">
        <h4 class="mb-3">Create Account</h4>
        <form action="actions/auth_action.php" method="POST">
            <input type="text" name="user" class="form-control mb-2" placeholder="Username" required>
            <input type="password" name="pass" class="form-control mb-3" placeholder="Password" required>
            <button type="submit" name="register" class="btn btn-primary w-100">Sign Up</button>
        </form>
    </div>
</div>