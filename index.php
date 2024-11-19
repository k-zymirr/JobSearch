<?php require_once __DIR__ . "/config.php"?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link rel="icon" href="img/favicon.png">
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <span class="fr">
        <header>
            <h1>Job Search</h1>
        </header>
        <button class="theme" onclick="changeTheme()"></button>
        <button class="lang-fr" onclick="changeLanguage()"></button>
        <div>
            <h2>Ajouter une offre</h2>
            <form action="add_offer.php" method="post">
                <div>
                    <div>
                        <input type="text" name="offer" id="offer" required>
                        <label for="offer">Nom de l'offre</label>
                    </div>
                    <div>
                        <input type="text" name="link" id="link" required>
                        <label for="link">Lien de l'offre</label>
                    </div>
                </div>
                <div class="ranking">
                    <div>
                        <div>
                            <input type="text" name="skill" id="skill" required>
                            <label for="skill">Compétences demandées</label>
                        </div>
                        <div>
                            <label for="noteSkill">Note</label>
                            <input type="number" id="noteSkillNumber" name="noteSkillNumber" min="0" max="10" value="" required>
                            <input type="range" id="noteSkill" name="noteSkill" min="0" max="10" value="0">
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="text" name="location" id="location" required>
                            <label for="location">Emplacement</label>
                        </div>
                        <div>
                            <label for="noteLocation">Note</label>
                            <input type="number" id="noteLocationNumber" name="noteLocationNumber" min="0" max="10" value="" required>
                            <input type="range" id="noteLocation" name="noteLocation" min="0" max="10" value="0">
                        </div>
                    </div>
                </div>
                <div class="send">
                    <input type="submit" value="Ajouter">
                    <input type="reset" value="Annuler">
                </div>
            </form>
        </div>

        <form action="modify_offer.php" method="post">
            <?php
                try {
                    $getOffers->execute();
                    $offers = $getOffers->fetchAll();

                    if (count($offers) > 0) {
            ?>
            <table>
                <thead>
                    <tr>
                        <td>Nom de l'offre</td>
                        <td>Lien vers l'offre</td>
                        <td>Compétences demandées</td>
                        <td>Note</td>
                        <td>Emplacement</td>
                        <td>Note</td>
                        <td>Score</td>
                        <td>Postulé</td>
                        <td>Réponse</td>
                        <td>Supprimer</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($offers as &$offr):
                ?>
                    <tr>
                        <td><?= $offr["name"] ?></td>
                        <td class="center"><a href="<?= $offr["link"] ?>" target="_blank" rel="noopener noreferrer"><?= explode(".",$offr["link"])[1] ?></a></td>
                        <td><?= $offr["skill"] ?></td>
                        <td class="center"><?= $offr["noteSkill"] ?>/10</td>
                        <td><?= $offr["location"] ?></td>
                        <td class="center"><?= $offr["noteLocation"] ?>/10</td>
                        <td class="center"><?= $offr["score"] ?>/20</td>
                        <td class="center"><input type="checkbox" name="postule-<?= $offr["id"] ?>" id="postule-<?= $offr["id"] ?>" class="modifBase" <?= $offr["applied"] == 1 ? "checked" : "" ?>></td>
                        <td><input type="text" name="reponse-<?= $offr["id"] ?>" id="reponse-<?= $offr["id"] ?>" class="modifBase" <?= strlen($offr["response"]) == 0 ? "" : "value='" . $offr["response"] . "'" ?>></td>
                        <td>
                            <label for="delete-<?= $offr["id"] ?>" class="del"><button type="button" onclick="toggleCheckbox(<?= $offr['id'] ?>)">Supprimer</button></label>
                            <input type="checkbox" name="delete-<?= $offr["id"] ?>" id="delete-<?= $offr["id"] ?>" class="modifBase">
                        </td>
                    </tr>
            <?php
                    endforeach;
            ?>
                </tbody>
            </table>
            <input type="submit" value="submit" id="changed-fr">
            <?php
            }
                } catch (PDOException $e) {
                    //pass
                }
            ?>
        </form>
    </span>

    <span class="en" style="display:none;">
        <header>
            <h1>Job Search</h1>
        </header>
        <button class="theme" onclick="changeTheme()"></button>
        <button class="lang-en" onclick="changeLanguage()"></button>
        <div>
            <h2>Add a Job Offer</h2>
            <form action="add_offer.php" method="post">
                <div>
                    <div>
                        <input type="text" name="offer" id="offer" required>
                        <label for="offer">Job Offer Name</label>
                    </div>
                    <div>
                        <input type="text" name="link" id="link" required>
                        <label for="link">Job Offer Link</label>
                    </div>
                </div>
                <div class="ranking">
                    <div>
                        <div>
                            <input type="text" name="skill" id="skill" required>
                            <label for="skill">Required Skills</label>
                        </div>
                        <div>
                            <label for="noteSkill">Rating</label>
                            <input type="number" id="noteSkillNumber" name="noteSkillNumber" min="0" max="10" value="" required>
                            <input type="range" id="noteSkill" name="noteSkill" min="0" max="10" value="0">
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="text" name="location" id="location" required>
                            <label for="location">Location</label>
                        </div>
                        <div>
                            <label for="noteLocation">Rating</label>
                            <input type="number" id="noteLocationNumber" name="noteLocationNumber" min="0" max="10" value="" required>
                            <input type="range" id="noteLocation" name="noteLocation" min="0" max="10" value="0">
                        </div>
                    </div>
                </div>
                <div class="send">
                    <input type="submit" value="Add">
                    <input type="reset" value="Cancel">
                </div>
            </form>
        </div>

        <form action="modify_offer.php" method="post">
            <?php
                try {
                    $getOffers->execute();
                    $offers = $getOffers->fetchAll();

                    if (count($offers) > 0) {
            ?>
            <table>
                <thead>
                    <tr>
                        <td>Job Offer Name</td>
                        <td>Job Offer Link</td>
                        <td>Required Skills</td>
                        <td>Rating</td>
                        <td>Location</td>
                        <td>Rating</td>
                        <td>Score</td>
                        <td>Applied</td>
                        <td>Response</td>
                        <td>Delete</td>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach ($offers as &$offr):
                ?>
                    <tr>
                        <td><?= $offr["name"] ?></td>
                        <td class="center"><a href="<?= $offr["link"] ?>" target="_blank" rel="noopener noreferrer"><?= explode(".",$offr["link"])[1] ?></a></td>
                        <td><?= $offr["skill"] ?></td>
                        <td class="center"><?= $offr["noteSkill"] ?>/10</td>
                        <td><?= $offr["location"] ?></td>
                        <td class="center"><?= $offr["noteLocation"] ?>/10</td>
                        <td class="center"><?= $offr["score"] ?>/20</td>
                        <td class="center"><input type="checkbox" name="postule-<?= $offr["id"] ?>" id="postule-<?= $offr["id"] ?>" class="modifBase" <?= $offr["applied"] == 1 ? "checked" : "" ?>></td>
                        <td><input type="text" name="reponse-<?= $offr["id"] ?>" id="reponse-<?= $offr["id"] ?>" class="modifBase" <?= strlen($offr["response"]) == 0 ? "" : "value='" . $offr["response"] . "'" ?>></td>
                        <td>
                            <label for="delete-<?= $offr["id"] ?>" class="del"><button type="button" onclick="toggleCheckbox(<?= $offr['id'] ?>)">Delete</button></label>
                            <input type="checkbox" name="delete-<?= $offr["id"] ?>" id="delete-<?= $offr["id"] ?>" class="modifBase">
                        </td>
                    </tr>
            <?php
                    endforeach;
            ?>
                </tbody>
            </table>
            <input type="submit" value="submit" id="changed-en">
            <?php
            }
                } catch (PDOException $e) {
                    //pass
                }
            ?>
        </form>
    </span>
</body>
</html>
