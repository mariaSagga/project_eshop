<?php include '../includes/db.php'; ?>
<?php include '../includes/header.php'; ?>
<div class="container mt-4">
    <h2>Admin Panel</h2>
    <a href="add_product.php" class="btn btn-primary mb-2">Add Product</a>
    <table class="table">
        <thead><tr><th>ID</th><th>Name</th><th>Price</th><th>Purchases</th><th>Actions</th></tr></thead>
        <tbody>
        <?php
        $res = $conn->query("SELECT * FROM products");
        while ($row = $res->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id'];?></td>
                <td><?php echo htmlspecialchars($row['name']);?></td>
                <td><?php echo $row['price'];?></td>
                <td><?php echo $row['purchases'];?></td>
                <td>
                    <a href="edit_product.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-warning">Edit</a>
                    <a href="delete_product.php?id=<?php echo $row['id'];?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete this product?')">Delete</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
    <h3>Most Purchased Products</h3>
    <canvas id="chart" height="100"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
fetch('chart_data.php')
    .then(res => res.json())
    .then(data => {
        const ctx = document.getElementById('chart').getContext('2d');
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: data.names,
                datasets: [{
                    label: 'Purchases',
                    data: data.purchases
                }]
            }
        });
    });
</script>
<?php include '../includes/footer.php'; ?>