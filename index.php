<?php
session_start();

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

    <div class="container" style="margin-top: 50px;">
        <h1>Выберите действие</h1>
        <div class="actions">
            <div class="show-recipes">
                <button class="show-rec">Показать рецепты</button>
            </div>
            <div class="show-ingredients">
                <button class="show-ing">Показать ингридиенты</button>
            </div>
        </div>
        <?php if (isset($_SESSION['message'])) { ?>
            <p class="msg"><?= $_SESSION['message'] ?></p>
        <?php }
        unset($_SESSION['message']);
        ?>
    </div>
    <div class="container recipes-list none">
        <h1>Список рецептов</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Ингридиенты</th>
                <th scope="col">Шаги приготовления</th>
                <th scope="col">Фото</th>
            </tr>
            </thead>
            <tbody>
                <?php
                session_start();
                $recipes = [];
                if (isset($_SESSION['recipes'])) {
                    $recipes = $_SESSION['recipes'];
                    unset($_SESSION['recipes']);
                }

                for ($i = 0; $i < count($recipes); $i++) { ?>
                        <tr>
                            <th><?= $i + 1 ?></th>
                            <td><?=$recipes[$i]['title'] ?></td>
                            <td><?= $recipes[$i]['ingredients'] ?></td>
                            <td><?= $recipes[$i]['cooking_steps'] ?></td>
                            <td><?= $recipes[$i]['photo'] ?></td>
                            <td><a href="edit_recipe.php?id=<?php echo $recipes[$i]['id']; ?>">Редактировать</a></td>
                            <td><a href="assets/action/api.php?method=deleteRec&id=<?php echo $recipes[$i]['id']; ?>">Удалить</a></td>
                            <td><a href="recipe.php?id=<?php echo $recipes[$i]['id']; ?>">Подробнее</a></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
            </tbody>
        </table>
    </div>
    <div class="container ing-list none">
        <h1>Список ингридиентов</h1>
        <table class="table table-dark">
            <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Наименование</th>
                <th scope="col">Единицы измерения</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $ingredients = [];
            if (isset($_SESSION['ingredients'])) {
                $ingredients = $_SESSION['ingredients'];
                unset($_SESSION['ingredients']);
            }

            for ($i = 0; $i < count($ingredients); $i++) { ?>
                <tr>
                    <th><?= $i + 1 ?></th>
                    <td><?=$ingredients[$i]['title'] ?></td>
                    <td><?= $ingredients[$i]['measure'] ?></td>
                    <td><a href="edit_ingredient.php?id=<?php echo $ingredients[$i]['id'] ?>">Редактировать</a></td>
                    <td><a href="assets/action/api.php?method=deleteIng&id=<?php echo $ingredients[$i]['id'] ?>" class="delete-ing">Удалить</a></td>
                    <td><a href="ingredient.php?id=<?php echo $ingredients[$i]['id'] ?>">Подробнее</a></td>
                </tr>
            <?php }
            ?>
            </tbody>
        </table>
        </tbody>
        </table>
    </div>
<script src="assets/js/jquery-3.7.0.min.js"></script>
<script src="assets/js/script.js"></script>
</body>
</html>