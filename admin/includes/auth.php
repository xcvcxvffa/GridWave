<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['user_id'])) {
    header("Location: signin.php");
    exit;
}

// Fetch fresh user data on every page load
require_once __DIR__ . '/../src/db.php';
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$_SESSION['user_id']]);
$user_data = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user_data) {
    // User deleted or not found
    session_destroy();
    header("Location: signin.php");
    exit;
}

$_SESSION['user_data'] = $user_data;
?>
