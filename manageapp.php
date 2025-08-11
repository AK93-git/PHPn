<?php
// Repository: php-crud-product-manager
// New Feature: Update product details

function updateProduct($id, $name, $price) {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE products SET name = :name, price = :price WHERE id = :id");
    $stmt->execute(['id' => $id, 'name' => $name, 'price' => $price]);
    echo "Product updated successfully.\n";
}

// Example usage
updateProduct(1, "Updated Laptop", 899.99);
listProducts();
?>
