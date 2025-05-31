<?php
include '../includes/db.php';
$res = $conn->query("SELECT name, purchases FROM products ORDER BY purchases DESC LIMIT 5");
$names = [];
$purchases = [];
while ($row = $res->fetch_assoc()) {
    $names[] = $row['name'];
    $purchases[] = $row['purchases'];
}
echo json_encode(['names' => $names, 'purchases' => $purchases]);