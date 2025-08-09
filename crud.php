<?php
// Database connection
$pdo = new PDO('sqlite::memory:'); // In-memory SQLite database for demonstration
$pdo->exec("CREATE TABLE products (id INTEGER PRIMARY KEY, name TEXT, price REAL)");

// Function to add a product
function addProduct($name, $price) {
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO products (name, price) VALUES (:name, :price)");
    $stmt->execute(['name' => $name, 'price' => $price]);
}

// Function to list all products
function listProducts() {
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM products");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID: {$row['id']}, Name: {$row['name']}, Price: {$row['price']}\n";
    }
}

// Add a product
addProduct("Laptop", 999.99);
addProduct("Smartphone", 499.99);

// List all products
listProducts();
?>
