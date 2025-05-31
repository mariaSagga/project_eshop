<?php include 'includes/db.php'; ?>
<?php include 'includes/header.php'; ?>

<div class="container mt-4">
    <h2 class="mb-4">Product Catalog</h2>
    <form class="mb-3" method="get">
        <input type="text" name="search" class="form-control" placeholder="Search by name..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
    </form>
    <div class="mb-2">
        <a href="?sort=name">Sort by Name</a> | <a href="?sort=price">Sort by Price</a>
    </div>
    <div class="row">
    <?php
        // Pagination and search
        $per_page = 5;
        $page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
        $start = ($page-1)*$per_page;
        $search = isset($_GET['search']) ? $conn->real_escape_string($_GET['search']) : '';
        $sort = isset($_GET['sort']) ? $_GET['sort'] : 'name';
        $allowed_sorts = ['name', 'price'];
        if (!in_array($sort, $allowed_sorts)) $sort = 'name';

        $where = $search ? "WHERE name LIKE '%$search%'" : "";
        $sql = "SELECT * FROM products $where ORDER BY $sort LIMIT $start, $per_page";
        $result = $conn->query($sql);

        while ($row = $result->fetch_assoc()): ?>
            <div class="col-md-4 mb-3">
                <div class="card">
                    <img src="images/<?php echo htmlspecialchars($row['image']); ?>" class="card-img-top" alt="">
                    <div class="card-body">
                        <h5 class="card-title"><?php echo htmlspecialchars($row['name']); ?></h5>
                        <p class="card-text"><?php echo htmlspecialchars($row['description']); ?></p>
                        <p><b>$<?php echo $row['price']; ?></b></p>
                        <a href="product.php?id=<?php echo $row['id']; ?>" class="btn btn-primary">View</a>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>
    </div>

    <!-- Pagination -->
    <?php
        $count_sql = "SELECT COUNT(*) as total FROM products $where";
        $count_res = $conn->query($count_sql);
        $total = $count_res->fetch_assoc()['total'];
        $pages = ceil($total / $per_page);
    ?>
    <nav>
        <ul class="pagination">
            <?php for ($i=1;$i<=$pages;$i++): ?>
                <li class="page-item<?php if ($i==$page) echo ' active'; ?>">
                    <a class="page-link" href="?page=<?php echo $i; ?><?php if ($sort) echo "&sort=$sort"; ?><?php if ($search) echo "&search=$search"; ?>"><?php echo $i; ?></a>
                </li>
            <?php endfor; ?>
        </ul>
    </nav>
</div>

<?php include 'includes/footer.php'; ?>