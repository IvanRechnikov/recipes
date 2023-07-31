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
    <form action="assets/action/api.php" method="post" id="add-ing">
        <h2>Добавление рецепта</h2>
        <label>Наименование</label>
        <input type="text" name="title" placeholder="Уксус">
        <label>Единица измерения</label>
        <input type="text" name="measure" placeholder="мл">
        <!--            <label>Фотография</label>-->
        <!--            <input type="image" name="photo">-->
        <button type="submit" class="add-ing-btn">Добавить</button>
        <p class="msg none"></p>
    </form>
</div>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>