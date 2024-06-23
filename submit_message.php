<?php
global $pdo;
require 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $msg = $_POST['msg'];

    $stmt = $pdo->prepare("INSERT INTO guest (name, city, email, url, msg, hide) VALUES (?, ?, ?, ?, ?, 'show')");
    $stmt->execute([$name, $city, $email, $url, $msg]);

    echo "Сообщение успешно добавлено!";
}
?>
