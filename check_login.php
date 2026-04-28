<?php
header('Content-Type: application/json');

if (isset($_GET['login'])) {
    $login = trim($_GET['login']);
    $pdo = new PDO("mysql:host=localhost;dbname=my_site;charset=utf8", "root", "");

    $stmt = $pdo->prepare("SELECT id FROM Users WHERE login = ?");
    $stmt->execute([$login]);
    
    $exists = $stmt->fetch() ? true : false;
    
    echo json_encode(['exists' => $exists]);
}