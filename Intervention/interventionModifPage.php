<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/pageStyle.css">
    <title>Modification Intervention</title>
</head>
<body>
    <?php
    include "../connexion.php";
    include "../menu.php";

    $id = $_POST["id_intervention"];
    $req = $pdo->prepare("SELECT * FROM intervention WHERE id= ?;");
    $req->execute([$id]);
    $intervention = $req->fetch(PDO::FETCH_ASSOC);

    // Convertir le datetime MySQL en format HTML datetime-local
    $datetimeHTML = str_replace(" ", "T", $intervention["dateTime"]);

    // récupérer le noms des casernes  pour la liste déroulante
    $casernes = $pdo->query("SELECT id, nom FROM caserne ORDER BY nom")->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="contenu-page">
        <h1>Modifier une intervention</h1>
        <!-- formulaire de modification -->
        <form action="modifIntervention.php" method="POST" class="form-caserne">

            <input type="hidden" name="id_intervention" value ="<?= $intervention['id'] ?>">

            <div class="form-group">
                <label>Adresse :</label>
                <input type="text" name="adresse" value="<?= $intervention['adresse'] ?>" required>
            </div>

            <div class="form-group">
                <label>Date et Heure :</label>
                <input type="datetime-local" name="dateTime" value="<?= $datetimeHTML ?>" required>
            </div>

            <div class="form-group">
                <label>Type d'intervention :</label>
                <input type="text" name="type_intervention" value="<?= $intervention['type_intervention'] ?>" required>
            </div>

            <!-- la liste déroulante -->
            <div class="form-group">
                <label>Nom de la Caserne</label>
                <select name="id_caserne" required>
                    <?php foreach ($casernes as $c): ?>
                        <option value="<?= $c['id'] ?>"
                            <?= ($c['id'] == $intervention['id_caserne']) ? 'selected' : '' ?>>
                            <?= $c['nom'] ?>
                        </option>
                    <?php endforeach; ?>
                </select>
            </div>
                <button type="submit" class="btn-submit">Enregistrer les modifications</button>
        </form>
    </div>

</body>
</html>