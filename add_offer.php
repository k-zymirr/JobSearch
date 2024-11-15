<?php
$dns = 'sqlite:./db.sqlite';
$pdo = new PDO($dns);
$addOffer;

try {
    $addOffer = $pdo->prepare("
    INSERT INTO Offers (name, link, skill, noteSkill, location, noteLocation, score, applied, response)
    VALUES (:name, :link, :skill, :noteSkill, :location, :noteLocation, :score, :applied, :response)");
} catch (PDOException $e) {
    if ($e->getCode() === "HY000"){
        $pdo->exec("
            CREATE TABLE IF NOT EXISTS Offers (
                id INTEGER PRIMARY KEY AUTOINCREMENT,
                name TEXT NOT NULL,
                link TEXT NOT NULL,
                skill TEXT NOT NULL,
                noteSkill INTEGER NOT NULL,
                location TEXT NOT NULL,
                noteLocation INTEGER NOT NULL,
                score INTEGER NOT NULL,
                applied INTEGER NOT NULL,
                response TEXT
            )");

            $addOffer = $pdo->prepare("
            INSERT INTO Offers (name, link, skill, noteSkill, location, noteLocation, score, applied, response)
            VALUES (:name, :link, :skill, :noteSkill, :location, :noteLocation, :score, :applied, :response)");
        }
} finally {
    $link = $_POST['link'];
    if (strpos($link, 'http') === false) {
        $link = 'http://' . $link;
    }
    if (strpos($link, 'www.') === false) {
        $link = str_replace('http://', 'http://www.', $link);
    }

    $addOffer->execute([
        'name' => $_POST['offer'],
        'link' => $link,
        'skill' => $_POST['skill'],
        'noteSkill' => $_POST['noteSkill'],
        'location' => $_POST['location'],
        'noteLocation' => $_POST['noteLocation'],
        'score' => $_POST['noteSkill'] + $_POST['noteLocation'],
        'applied' => 0,
        'response' => ""
    ]);

    header('Refresh:0; url=index.php');
    die();
}
