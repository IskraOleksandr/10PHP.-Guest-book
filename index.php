<?php
require 'config.php';
global $pdo;
$stmt = $pdo->query("SELECT * FROM guest WHERE hide = 'show' ORDER BY puttime DESC");
$messages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга</title>
</head>
<body>
<h1>Гостевая книга</h1>
<a href="add_message.php">Добавить сообщение</a>
<hr>
<?php foreach ($messages as $message): ?>
    <div>
        <h3><?php echo htmlspecialchars($message['name']); ?> из <?php echo htmlspecialchars($message['city']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($message['msg'])); ?></p>
        <?php if ($message['answer']): ?>
            <div style="margin-left: 20px; padding-left: 10px; border-left: 2px solid #ccc;">
                <strong>Ответ администратора:</strong>
                <p><?php echo nl2br(htmlspecialchars($message['answer'])); ?></p>
            </div>
        <?php endif; ?>
        <small>Добавлено: <?php echo $message['puttime']; ?></small>
    </div>
    <hr>
<?php endforeach; ?>
</body>
</html>
