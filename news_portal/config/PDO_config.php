<?php
try {
    return new PDO("mysql:dbname=electrichka;host=127.0.0.1", "root", "");
} catch (PDOException $e) {
    echo 'Подключение не удалось: ' . $e->getMessage();
}
