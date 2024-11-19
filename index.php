<?php require_once __DIR__ . "/config.php"?>

<!DOCTYPE html>


<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Search</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js"></script>
</head>
<body>
    <header>
        <h1>Job Search</h1>
    </header>
    <button class="theme" onclick="changeTheme()"></button>
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
        <input type="submit" value="submit" id="changed">
        <?php
        }
            } catch (PDOException $e) {
                //pass
            }
        ?>
    </form>
</body>
</html>
