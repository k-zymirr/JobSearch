<?php

$dns = 'sqlite:./db.sqlite';
$pdo = new PDO($dns);

echo "<pre>";
var_dump($_POST);

if (!empty($_POST)) {
    $pdo->exec("UPDATE Offers SET applied = 0");
    foreach ($_POST as $key => $value) {
        $column = explode('-', htmlspecialchars($key))[0];
        if ($column == "postule"){
            $pdo->exec("UPDATE Offers SET applied = 1 WHERE id = " . explode('-', htmlspecialchars($key))[1]);
        }
    }
}