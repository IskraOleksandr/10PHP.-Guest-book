<?php
try {
    $pdo = new PDO("mysql:host=localhost;dbname=guestbook_db", 'root', '');
} catch (PDOException $e) {
    die("Could not connect to the database guestbook_db :" . $e->getMessage());
}
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_msg'])) {
    $id_msg = $_POST['id_msg'];
    $answer = $_POST['answer'];
    $hide = $_POST['hide'];

    $stmt = $pdo->prepare("UPDATE guest SET answer = ?, hide = ? WHERE id_msg = ?");
    $stmt->execute([$answer, $hide, $id_msg]);
}

$stmt = $pdo->query("SELECT * FROM guest ORDER BY puttime DESC");
$messages = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга - Администрирование</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<div class="container">
<h1>Администрирование</h1>
<hr>
<?php foreach ($messages as $message): ?>
    <div class="message">
        <h3><?php echo htmlspecialchars($message['name']); ?> из <?php echo htmlspecialchars($message['city']); ?></h3>
        <p><?php echo nl2br(htmlspecialchars($message['msg'])); ?></p>
        <form action="admin.php" method="POST">
            <input type="hidden" name="id_msg" value="<?php echo $message['id_msg']; ?>">
            Ответ: <textarea name="answer"><?php echo htmlspecialchars($message['answer']); ?></textarea><br>
            Показать:
            <select name="hide">
                <option value="show" <?php if ($message['hide'] == 'show') echo 'selected'; ?>>Да</option>
                <option value="hide" <?php if ($message['hide'] == 'hide') echo 'selected'; ?>>Нет</option>
            </select><br><br>
            <input type="submit" value="Сохранить">
        </form>
        <small>Добавлено: <?php echo $message['puttime']; ?></small>
    </div>
    <hr>
<?php endforeach; ?>
</div>
</body>
</html>
