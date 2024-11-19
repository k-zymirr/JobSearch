<?php
require_once __DIR__ . '/config.php';


$link = $_POST["link"];
if (strpos($link, "http") === false) {
    $link = "http://" . $link;
}
if (strpos($link, "www.") === false) {
    $link = str_replace("http://", "http://www.", $link);
}

$addOffer->execute([
    "name" => $_POST["offer"],
    "link" => $link,
    "skill" => $_POST["skill"],
    "noteSkill" => $_POST["noteSkill"],
    "location" => $_POST["location"],
    "noteLocation" => $_POST["noteLocation"],
    "score" => $_POST["noteSkill"] + $_POST["noteLocation"],
    "applied" => 0,
    "response" => "",
]);

header("Refresh:0; url=index.php");
die();
