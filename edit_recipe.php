<?php
require_once __DIR__ . '/assets/action/database/database.php';

$id = $_GET['id'];

$sth = $dbh->prepare('SELECT * FROM `recipes` WHERE id = ?');
$sth->execute([$id]);

$recipe = $sth->fetch();
?>

<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Главная</title>
</head>
<body>
<div class="container">
    <?php require_once 'assets/elements/navbar.php'; ?>
</div>
<div class="container add">
    <form action="assets/action/api.php" method="post" id="edit-rec">
        <h2>Добавление рецепта</h2>
        <label>Наименование</label>
        <input type="text" name="title" placeholder="Пирог" value="<?php echo $recipe['title']; ?>">
        <label>Ингридиенты</label>
        <input type="text" name="ing" placeholder="Вода, сахар, соль..." value="<?php echo $recipe['ingredients']; ?>">
        <label>Шаги приготовления</label>
        <input type="text" name="steps" placeholder="Добавить соль..." value="<?php echo $recipe['cooking_steps']; ?>">
        <input type="text" name="id" value="<?php echo $recipe['id'] ?>" style="display: none">
        <!--            <label>Фотография</label>-->
        <!--            <input type="image" name="photo">-->
        <button type="submit" class="edit-rec-btn">Изменить</button>
        <p class="msg none"></p>
    </form>
</div>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>