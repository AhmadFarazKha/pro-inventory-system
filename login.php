<?php include 'partials/header.php'; ?>
<div class="row justify-content-center mt-5">
    <div class="col-md-4 card p-4 shadow-sm border-0">
        <h3 class="text-center mb-4">Login</h3>
        <?php if(isset($_GET['error'])) echo '<div class="alert alert-danger">Invalid Username/Password</div>'; ?>
        <form action="actions/auth_action.php" method="POST">
            <div class="mb-3">
                <label>Username</label>
                <input type="text" name="user" class="form-control" placeholder="Enter username" required>
            </div>
            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="pass" class="form-control" placeholder="Enter password" required>
            </div>
            <button type="submit" name="login_user" class="btn btn-primary w-100">Sign In</button>
        </form>
        <p class="text-center mt-3 small">New user? <a href="register.php">Register Account</a></p>
    </div>
</div>
<?php include 'partials/footer.php'; ?>