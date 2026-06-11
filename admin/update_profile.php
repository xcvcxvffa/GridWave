<?php
require_once __DIR__ . '/includes/auth.php';
require_once __DIR__ . '/src/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $first_name = $_POST['first_name'] ?? '';
    $last_name = $_POST['last_name'] ?? '';
    $email = $_POST['email'] ?? '';
    $phone = $_POST['phone'] ?? '';
    $bio = $_POST['bio'] ?? '';
    $facebook = $_POST['facebook'] ?? '';
    $x_com = $_POST['x_com'] ?? '';
    $linkedin = $_POST['linkedin'] ?? '';
    $instagram = $_POST['instagram'] ?? '';

    $user_id = $_SESSION['user_id'];
    $avatar_path = $_SESSION['user_data']['avatar'] ?? null;

    // Handle avatar upload
    if (isset($_FILES['avatar']) && $_FILES['avatar']['error'] === UPLOAD_ERR_OK) {
        $upload_dir = __DIR__ . '/src/images/user/';
        if (!is_dir($upload_dir)) {
            mkdir($upload_dir, 0777, true);
        }
        
        $tmp_name = $_FILES['avatar']['tmp_name'];
        $name = basename($_FILES['avatar']['name']);
        $ext = strtolower(pathinfo($name, PATHINFO_EXTENSION));
        
        if (in_array($ext, ['jpg', 'jpeg', 'png'])) {
            $new_name = 'user_' . $user_id . '_' . time() . '.' . $ext;
            if (move_uploaded_file($tmp_name, $upload_dir . $new_name)) {
                $avatar_path = 'src/images/user/' . $new_name;
            }
        }
    }

    $stmt = $pdo->prepare("
        UPDATE users 
        SET first_name = ?, last_name = ?, email = ?, phone = ?, bio = ?, avatar = ?,
            facebook = ?, x_com = ?, linkedin = ?, instagram = ?
        WHERE id = ?
    ");
    $stmt->execute([
        $first_name, $last_name, $email, $phone, $bio, $avatar_path,
        $facebook, $x_com, $linkedin, $instagram, $user_id
    ]);

    header("Location: profile.php");
    exit;
}
