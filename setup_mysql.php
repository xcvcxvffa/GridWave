<?php
// Script to set up MySQL database 'gridwave_energy' and 'users' table

$host = '127.0.0.1';
$user = 'root';
$pass = '';

try {
    // Connect to MySQL server without selecting a database
    $pdo = new PDO("mysql:host=$host", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Drop and create database
    $pdo->exec("DROP DATABASE IF EXISTS gridwave_energy");
    $pdo->exec("CREATE DATABASE gridwave_energy CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci");
    echo "Database 'gridwave_energy' created successfully.\n";

    // Select the new database
    $pdo->exec("USE gridwave_energy");

    // Create users table
    $createTableQuery = "
        CREATE TABLE users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            email VARCHAR(255) NOT NULL UNIQUE,
            password VARCHAR(255) NOT NULL,
            role ENUM('super_admin', 'admin', 'editor') DEFAULT 'admin',
            is_active TINYINT(1) DEFAULT 1,
            failed_attempts INT DEFAULT 0,
            is_locked TINYINT(1) DEFAULT 0,
            locked_until DATETIME NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            last_login DATETIME NULL
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
    ";
    $pdo->exec($createTableQuery);
    echo "Table 'users' created successfully.\n";

    // Insert default admin user
    $adminEmail = 'admin@gridwave.energy';
    $adminPass = 'Admin@123!';
    $hashedPass = password_hash($adminPass, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES ('GridWave Admin', ?, ?, 'super_admin')");
    $stmt->execute([$adminEmail, $hashedPass]);
    echo "Admin user created successfully ($adminEmail / $adminPass).\n";

} catch (PDOException $e) {
    die("Database setup failed: " . $e->getMessage() . "\n");
}
