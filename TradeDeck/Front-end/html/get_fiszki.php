<?php
$host = 'localhost';
$db = 'fiszki';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$pdo = new PDO("mysql:host=$host;dbname=$db;charset=$charset", $user, $pass);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$level = isset($_GET['level']) ? (int)$_GET['level'] : 1;

$stmt = $pdo->prepare("SELECT nazwa, tresc FROM fiszka WHERE poziom = ? LIMIT 10");
$stmt->execute([$level]);
$fiszki = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($fiszki);
?>
