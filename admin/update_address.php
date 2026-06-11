<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $country = $_POST['country'] ?? '';
    $city_state = $_POST['city_state'] ?? '';
    $postal_code = $_POST['postal_code'] ?? '';
    $office_address = $_POST['office_address'] ?? '';

    $user_id = $_SESSION['user_id'];

    $stmt = $pdo->prepare("
        UPDATE users 
        SET country = ?, city_state = ?, postal_code = ?, office_address = ?
        WHERE id = ?
    ");
    $stmt->execute([
        $country, $city_state, $postal_code, $office_address, $user_id
    ]);

    header("Location: profile.php");
    exit;
}
