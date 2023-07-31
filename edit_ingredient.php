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
<div class="container add">
    <form action="assets/action/api.php" method="post" id="edit-ing">
        <h2>Добавление рецепта</h2>
        <label>Наименование</label>
        <input type="text" name="title" placeholder="Уксус" value="<?php echo $ingredient['title'] ?>">
        <label>Единица измерения</label>
        <input type="text" name="measure" placeholder="мл" value="<?php echo $ingredient['measure'] ?>">
        <input type="text" name="id" value="<?php echo $ingredient['id'] ?>" style="display: none">
        <button type="submit" class="edit-ing-btn">Изменить</button>
        <p class="msg none"></p>
    </form>
</div>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>