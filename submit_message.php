<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook_db", 'root', '');
} catch (PDOException $e) {
    die("Could not connect to the database guestbook_db :" . $e->getMessage());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $city = $_POST['city'];
    $email = $_POST['email'];
    $url = $_POST['url'];
    $msg = $_POST['msg'];

    $stmt = $pdo->prepare("INSERT INTO guest (name, city, email, url, msg, hide) VALUES (?, ?, ?, ?, ?, 'show')");
    $stmt->execute([$name, $city, $email, $url, $msg]);

    echo "<div class='container'>Сообщение успешно добавлено! <a href='index.php'>Вернуться к гостевой книге</a></div>";
}
?>
