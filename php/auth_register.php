<?php
// php/auth_register.php
require_once __DIR__ . '/db_connect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name  = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $pass  = $_POST['password'] ?? '';

    if (!$name || !$email || !$pass) {
        header('Location: ../register.html?error=Please fill all fields');
        exit;
    }

    // basic validation
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header('Location: ../register.html?error=Invalid email');
        exit;
    }

    // hash password
    $hash = password_hash($pass, PASSWORD_DEFAULT);

    // insert using prepared statement
    $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (:n, :e, :p, 'user')");
    try {
        $stmt->execute([':n'=>$name, ':e'=>$email, ':p'=>$hash]);
        header('Location: ../login.html?success=Account created, login now');
        exit;
    } catch (PDOException $e) {
        // duplicate email?
        header('Location: ../register.html?error=' . urlencode('Email already exists'));
        exit;
    }
}
header('Location: ../register.html');
exit;
