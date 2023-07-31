<?php
require_once __DIR__ . '/assets/action/database/database.php';

$id = $_GET['id'];

$sth = $dbh->prepare('SELECT * FROM `ingredients` WHERE id = ?');
$sth->execute([$id]);

$ingredient = $sth->fetch();
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
<div class="container">
    <h1>Ингридиент <?= $ingredient['title'] ?></h1>
    <h3>Единица измерения:</h3>
    <p><?= $ingredient['measure'] ?></p>
</div>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>