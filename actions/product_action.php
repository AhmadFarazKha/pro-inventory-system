<?php
require '../config/db.php';

// CREATE: Add Product with Image
if(isset($_POST['add_full'])){
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $qty = (int)$_POST['qty'];
    $unit = $_POST['unit'];
    $price = (float)$_POST['price'];
    
    // Process Image
    $imageName = time() . "_" . $_FILES['image']['name'];
    move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);

    $query = "INSERT INTO products (name, description, image, qty, unit, price) VALUES ('$name', '$desc', '$imageName', $qty, '$unit', $price)";
    if(mysqli_query($conn, $query)){
        header("Location: ../dashboard.php?status=added");
    }
}

// UPDATE: Full CRUD Logic for Edits
if(isset($_POST['update_full'])){
    $id = (int)$_POST['id'];
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $desc = mysqli_real_escape_string($conn, $_POST['description']);
    $qty = (int)$_POST['qty'];
    $unit = $_POST['unit'];
    $price = (float)$_POST['price'];

    // Image logic: only update if a new file is uploaded
    if(!empty($_FILES['image']['name'])){
        $imageName = time() . "_" . $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], "../uploads/" . $imageName);
        $query = "UPDATE products SET name='$name', description='$desc', image='$imageName', qty=$qty, unit='$unit', price=$price WHERE id=$id";
    } else {
        $query = "UPDATE products SET name='$name', description='$desc', qty=$qty, unit='$unit', price=$price WHERE id=$id";
    }

    if(mysqli_query($conn, $query)){
        header("Location: ../dashboard.php?status=updated");
    }
}

// DELETE
if(isset($_GET['del'])){
    $id = (int)$_GET['del'];
    mysqli_query($conn, "DELETE FROM products WHERE id=$id");
    header("Location: ../dashboard.php?status=deleted");
}
?>