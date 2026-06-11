<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $current_password = $_POST['current_password'] ?? '';
    $new_password = $_POST['new_password'] ?? '';
    $confirm_password = $_POST['confirm_password'] ?? '';

    if ($new_password !== $confirm_password) {
        // Here you would normally redirect back with an error message
        header("Location: profile.php?error=password_mismatch");
        exit;
    }

    $user_id = $_SESSION['user_id'];

    // Verify current password
    $stmt = $pdo->prepare("SELECT password FROM users WHERE id = ?");
    $stmt->execute([$user_id]);
    $user = $stmt->fetch();

    if ($user && password_verify($current_password, $user['password'])) {
        // Hash new password
        $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
        
        $update_stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        $update_stmt->execute([$hashed_password, $user_id]);
        
        header("Location: profile.php?success=password_changed");
        exit;
    } else {
        header("Location: profile.php?error=invalid_current_password");
        exit;
    }
}
