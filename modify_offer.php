<?php
require_once __DIR__ . '/config.php';


if (!empty($_POST)) {
    $pdo->exec("UPDATE Offers SET applied = 0");
    foreach ($_POST as $key => $value) {
        $column = explode('-', htmlspecialchars($key))[0];
        if ($column == "postule"){
            $pdo->exec("UPDATE Offers SET applied = 1 WHERE id = " . explode('-', htmlspecialchars($key))[1]);
        }elseif ($column == "reponse") {
            $pdo->exec("UPDATE Offers SET response = '" . htmlspecialchars($value) . "' WHERE id = " . explode('-', htmlspecialchars($key))[1]);
        }elseif ($column == "delete") {
            $pdo->exec("DELETE FROM Offers WHERE id = " . explode('-', htmlspecialchars($key))[1]);
        }
    }
}

header('Refresh:0; url=index.php');
die();
