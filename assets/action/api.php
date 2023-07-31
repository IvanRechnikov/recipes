<?php

require_once __DIR__ . '/database/database.php';

$method = $_GET['method'];

//Валидация полей (список с ошибочными полями)
$errorFields = [];

foreach ($_POST as $key => $item) {
    if ($item === '') {
        $errorFields[] = $key;
    }
}

if (!empty($errorFields)) {
    $response = [
        'status' => false,
        "message" => "Проверьте правильность полей",
        "fields" => $errorFields
    ];

    echo json_encode($response);
    die();
}

#1. Получение списка рецептов

if ($method === 'showRec') {

    $sth = $dbh->prepare('SELECT * FROM recipes');
    $sth->execute();

    session_start();
    $_SESSION['recipes'] = $sth->fetchAll();

    $response = [
        'status' => true,
        'message' => 'Успешно!'
    ];

    echo json_encode($response);
    die();
}

#2. Получение конкретного рецепта со списком ингредиентов по его идентификатору

//Реализованно без участия API

#3. Создание, редактирование и удаление рецепта.

//Создание

if ($method === 'addRec') {

    $title = $_POST['title'];
    $ing = $_POST['ing'];
    $steps = $_POST['steps'];

    $sth = $dbh->prepare('INSERT INTO `recipes` (title, ingredients, cooking_steps) VALUES (?, ?, ?)');
    $sth->execute([$title, $ing, $steps]);

    $response = [
        'status' => true,
        'message' => "Рецепт '$title' успешно добавлен!"
    ];

    echo json_encode($response);
    die();
}

//Редактирование

if ($method === 'editRec') {
    $title = $_POST['title'];
    $ing = $_POST['ing'];
    $steps = $_POST['steps'];
    $id = $_POST['id'];

    $sth = $dbh->prepare('UPDATE `recipes` SET title = ?, ingredients = ?, cooking_steps = ? WHERE id = ?');
    $sth->execute([$title, $ing, $steps, $id]);

    $response = [
        'status' => true,
        'message' => "Рецепт '$title' успешно обновлен!"
    ];

    echo json_encode($response);
    die();
}

//Удаление

if ($method === 'deleteRec') {
    $id = $_GET['id'];

    $sth = $dbh->prepare('DELETE FROM `recipes` WHERE id = ?');
    $sth->execute([$id]);

    session_start();
    $_SESSION['message'] = 'Успешно удалено!';

    header('Location: /');
}

#4. Создание, редактирование, просмотр и удаление ингредиентов

//Создание

if ($method === 'addIng') {
    $title = $_POST['title'];
    $measure = $_POST['measure'];

    $sth = $dbh->prepare('INSERT INTO `ingredients` (title, measure) VALUES (?, ?)');
    $sth->execute([$title, $measure]);

    $response = [
        'status' => true,
        'message' => "Ингридиент '$title' успешно добавлен!"
    ];

    echo json_encode($response);
    die();
}

//Редактирование

if ($method === 'editIng') {
    $title = $_POST['title'];
    $measure = $_POST['measure'];
    $id = $_POST['id'];

    $sth = $dbh->prepare('UPDATE `ingredients` SET title = ?, measure = ? WHERE id = ?');
    $sth->execute([$title, $measure, $id]);

    $response = [
        'status' => true,
        'message' => "Ингридиент '$title' успешно обновлен!"
    ];

    echo json_encode($response);
    die();
}

//Просмотр

if ($method === 'showIng') {
    $sth = $dbh->prepare('SELECT * FROM ingredients');
    $sth->execute();

    session_start();
    $_SESSION['ingredients'] = $sth->fetchAll();

    $response = [
        'status' => true,
        'message' => 'Успешно!'
    ];

    echo json_encode($response);
    die();
}

//Удаление

if ($method === 'deleteIng') {
    $id = $_GET['id'];

    $sth = $dbh->prepare('DELETE FROM `ingredients` WHERE id = ?');
    $sth->execute([$id]);

    session_start();
    $_SESSION['message'] = 'Успешно удалено!';

    header('Location: /');
}


