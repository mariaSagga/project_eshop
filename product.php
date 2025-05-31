<?php
include 'includes/db.php';
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$res = $conn->query("SELECT * FROM products WHERE id=$id");
if (!$res->num_rows) { die("Product not found"); }
$row = $res->fetch_assoc();

// Simulate purchase (for demo)
if (isset($_GET['buy'])) {
    $conn->query("UPDATE products SET purchases = purchases + 1 WHERE id=$id");
    header("Location: product.php?id=$id&bought=1");
    exit;
}
include 'includes/header.php';
?>
<div class="container mt-4">
    <h2><?php echo htmlspecialchars($row['name']); ?></h2>
    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" class="img-fluid" style="max-width:300px;">
    <p><?php echo htmlspecialchars($row['description']); ?></p>
    <p><b>Price: $<?php echo $row['price']; ?></b></p>
    <?php if (isset($_GET['bought'])): ?>
        <div class="alert alert-success">Thank you for your purchase!</div>
    <?php endif; ?>
    <a href="product.php?id=<?php echo $id; ?>&buy=1" class="btn btn-success">Buy Now</a>
</div>
<?php include 'includes/footer.php'; ?>