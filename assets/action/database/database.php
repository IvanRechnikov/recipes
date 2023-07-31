<?php

const USER_NAME = 'root';
const DB_PASSWORD = '';

try {
    // подключаемся к базе данных
    $dbh = new PDO("mysql:host=localhost;dbname=recipes", USER_NAME, DB_PASSWORD);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}