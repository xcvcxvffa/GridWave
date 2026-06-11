<?php
require_once __DIR__ . '/src/db.php';

try {
    $pdo->exec("ALTER TABLE users ADD COLUMN office_address VARCHAR(255) AFTER postal_code");
    echo "Column office_address added successfully.\n";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage() . "\n";
}
