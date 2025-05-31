<?php
include '../includes/db.php';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $conn->real_escape_string($_POST['name']);
    $desc = $conn->real_escape_string($_POST['description']);
    $price = (float)$_POST['price'];
    $image = basename($_FILES['image']['name']);
    move_uploaded_file($_FILES['image']['tmp_name'], "../images/$image");
    $conn->query("INSERT INTO products (name, description, price, image) VALUES ('$name', '$desc', $price, '$image')");
    header('Location: index.php');
    exit;
}
include '../includes/header.php';
?>
<div class="container mt-4">
    <h2>Add Product</h2>
    <form method="post" enctype="multipart/form-data">
        <input name="name" class="form-control mb-2" placeholder="Name" required>
        <textarea name="description" class="form-control mb-2" placeholder="Description"></textarea>
        <input name="price" type="number" step="0.01" class="form-control mb-2" placeholder="Price" required>
        <input name="image" type="file" class="form-control mb-2" required>
        <button class="btn btn-success">Add</button>
    </form>
</div>
<?php include '../includes/footer.php'; ?>