<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook_db", 'root', '');
} catch (PDOException $e) {
    die("Could not connect to the database guestbook_db :" . $e->getMessage());
}
$stmt = $pdo->query("SELECT * FROM guest WHERE hide = 'show' ORDER BY puttime DESC");
$messages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>

<div class="container">
<h1>Гостевая книга</h1>
<a href="add_message.php">Добавить сообщение</a>
<hr>
<?php foreach ($messages as $message): ?>
    <div class="message">
        <h3><?php echo htmlspecialchars($message['name']); ?> из <?php echo htmlspecialchars($message['city']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($message['msg'])); ?></p>
        <?php if ($message['answer']): ?>
            <div style="margin-left: 20px; padding-left: 10px; border-left: 2px solid #ccc;"><br>
                <strong>Ответ администратора:</strong>
                <p><?php echo nl2br(htmlspecialchars($message['answer'])); ?></p>
            </div>
        <?php endif; ?>
        <small>Добавлено: <?php echo $message['puttime']; ?></small>
    </div>
    <hr>
<?php endforeach; ?>
</div>
</body>
</html>
