<?php
// php/auth_login.php
session_start();
require_once __DIR__ . '/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    if (!$email || !$pass) {
        header('Location: ../login.html?error=Fill all fields');
        exit;
    }

    $stmt = $pdo->prepare("SELECT id, name, email, password, role FROM users WHERE email = :e LIMIT 1");
    $stmt->execute([':e' => $email]);
    $user = $stmt->fetch();

    if ($user && password_verify($pass, $user['password'])) {
        // regenerate session id
        session_regenerate_id(true);
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['user_name'] = $user['name'];
        $_SESSION['user_role'] = $user['role'];
        header('Location: ../dashboard.php');
        exit;
    } else {
        header('Location: ../login.html?error=Invalid credentials');
        exit;
    }
}
header('Location: ../login.html');
exit;
