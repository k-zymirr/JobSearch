<?php
$dns = "sqlite:./db.sqlite";
$pdo = new PDO($dns);

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

$getOffers = $pdo->prepare("SELECT * FROM Offers ORDER BY score DESC");