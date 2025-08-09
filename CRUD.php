<?php
// Repository: php-crud-product-manager
// Description: A simple CRUD application for managing products using SQLite.

// Database connection
$pdo = new PDO('sqlite::memory:'); // In-memory SQLite database for demonstration
$pdo->exec("CREATE TABLE products (id INTEGER PRIMARY KEY, name TEXT, price REAL)");

/**
 * Add a product to the database.
 */
function addProduct($name, $price) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
    $stmt->execute(['name' => $name, 'price' => $price]);
}

/**
 * List all products from the database.
 */
function listProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Price: {$row['price']}\n";
    }
}

// Example usage
addProduct("Laptop", 999.99);
addProduct("Smartphone", 499.99);
listProducts();
?>
