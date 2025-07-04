<?php
session_start();

require 'config_users.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = ($_POST['password']);

    try {
        $stmt = $pdo->prepare('SELECT * FROM users WHERE username = :username');
        $stmt->execute(['username' => $username]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $user['username'];

            header('Location: menu.php');
            exit();
        } else {
            header('Location: menu.php?login_error=invalid');
            exit();
        }
    } catch (PDOException $e) {
        header('Location: menu.php?login_error=server');
        exit();
    }
} else {
    header('Location: menu.php?login_error=invalid_request');
    exit();
}
?>