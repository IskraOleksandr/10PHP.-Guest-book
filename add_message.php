<!DOCTYPE html>
<html>
<head>
    <title>Гостевая книга - Добавить сообщение</title>
    <link rel="stylesheet" type="text/css" href="Style.css">
</head>
<body>
<div class="container">
<h1>Добавить сообщение</h1>
<form action="submit_message.php" method="POST">
    Имя: <input type="text" name="name" required><br>
    Город: <input type="text" name="city"><br>
    E-mail: <input type="email" name="email"><br>
    URL: <input type="url" name="url"><br>
    Сообщение: <textarea name="msg" required></textarea><br>
    <input type="submit" value="Отправить">
</form>
</div>
</body>
</html>
