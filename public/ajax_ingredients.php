<?php
require "../config/db.php";

$term = $_GET['term'] ?? '';

if (empty($term)) {
    echo json_encode([]);
    exit;
}

$stmt = $pdo->prepare("
    SELECT DISTINCT ingredient_name
    FROM ingredients
    WHERE ingredient_name LIKE ?
    ORDER BY ingredient_name
    LIMIT 8
");

$stmt->execute(["%$term%"]);

echo json_encode($stmt->fetchAll(PDO::FETCH_COLUMN));
