<?php
$host = '127.0.0.1';
$user = 'root';
$pass = '';
$dbname = 'gridwave_energy';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Alter table query
    $sql = "ALTER TABLE users 
            ADD COLUMN first_name VARCHAR(255) NULL,
            ADD COLUMN last_name VARCHAR(255) NULL,
            ADD COLUMN phone VARCHAR(50) NULL,
            ADD COLUMN bio TEXT NULL,
            ADD COLUMN avatar VARCHAR(255) NULL,
            ADD COLUMN country VARCHAR(100) NULL,
            ADD COLUMN city_state VARCHAR(255) NULL,
            ADD COLUMN postal_code VARCHAR(50) NULL,
            ADD COLUMN tax_id VARCHAR(100) NULL,
            ADD COLUMN facebook VARCHAR(255) NULL,
            ADD COLUMN x_com VARCHAR(255) NULL,
            ADD COLUMN linkedin VARCHAR(255) NULL,
            ADD COLUMN instagram VARCHAR(255) NULL";

    try {
        $pdo->exec($sql);
        echo "Successfully added columns to users table.\n";
    } catch (PDOException $e) {
        // Ignore duplicate column errors if script is run multiple times
        if ($e->getCode() === '42S21') {
            echo "Columns already exist.\n";
        } else {
            throw $e;
        }
    }
} catch (PDOException $e) {
    die("Database Error: " . $e->getMessage());
}
