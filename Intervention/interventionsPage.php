<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/pageStyle.css">
    <title>Intervention</title>
</head>
<body>
    <?php
    include "../connexion.php";
    include "../menu.php";

    $req = $pdo->prepare("SELECT i.id, i.adresse, i.dateTime, i.type_intervention, c.nom FROM intervention i Join caserne c ON i.id_caserne = c.id ORDER BY c.nom, i.datetime ;");
    $req->execute();
    $tab = $req->fetchAll(PDO::FETCH_ASSOC);

    $caserneActuelle = "";
    ?>

    <div class="contenu-page">
        <h1>Les Interventions par caserne</h1>

        <form method="POST">
            <?php foreach ($tab as $row): ?>
                <?php if ($caserneActuelle != $row["nom"]): ?>
                    <?php
                        if ($caserneActuelle != ""){
                            echo "</table><br>";
                        }
                        $caserneActuelle = $row["nom"];
                        echo "<h2>Caserne : " . $caserneActuelle . "</h2>";
                        echo "<table>";
                        echo "<tr>
                                <th>Adresse</th>
                                <th>Date et Heure</th>
                                <th>Type d'intervention</th>
                                <th>                </th>
                            </tr>";
                    ?>
                <?php endif; ?>
                <tr>
                    <td><?= $row["adresse"] ?></td>
                    <td><?= $row["dateTime"] ?></td>
                    <td><?= $row["type_intervention"] ?></td>
                    <td>
                        <input 
                            type="button"
                            value="Supprimer" 
                            onclick="
                                if (confirm('Voulez-vous vraiment supprimer : l\'intervention <?= $row['type_intervention'] ?> du <?= $row['dateTime'] ?> de la <?= $row['nom'] ?> ?')) {
                                    document.getElementById('id_intervention').value = '<?= $row['id'] ?>';
                                    this.form.action = 'supprimerIntervention.php';
                                    this.form.method = 'POST';
                                    this.form.submit();
                                }
                            "
                        >
                    </td>
                </tr>
            <?php endforeach; ?>

            <?php
            if ($caserneActuelle != "") {
                    echo "</table>";
                }
            ?>
            <input type="hidden" id="id_intervention" name="id_intervention">
        </form>
        <br/>
        <form action="viderListeIntervention.php" method="POST">
                <button type="submit" class="btn-submit">Vider</button>
        </form>
        <br/>
        <br/>
        <br/>
        <h1>Inscrire l'intervention d'une caserne</h1>
        <form action="ajouterIntervention.php" method="POST" class="form-caserne">
            <div class="form-group">
                <label> Adresse :</label>
                <input type="text" name="adresse" required>
            </div>
            <!-- le type: datetime-local permet de faire apparaitre un calendrier et un espace pour indiquer l'heure dans le formulaire !-->
             <!-- la date et l'heure seront envoyer dans la base MySQL dans le bon format !-->
            <div class="form-group">
                <label> Date et Heure :</label>
                <input type="datetime-local" name="dateTime" required>
            </div>
            <div class="form-group">
                <label> Type d'intervention :</label>
                <input type="text" name="type_intervention" required>
            </div>
            <div class="form-group">
                <label> Nom de la Caserne :</label>
                <select name="id_caserne" required>
                    <option value="">---- Choisir une caserne --</option>
                    <?php
                        $req = $pdo->query("SELECT id, nom FROM caserne ORDER BY nom;");
                        while ($c = $req->fetch()) {
                            echo "<option value='{$c['id']}'>{$c['nom']}</option>";
                        }
                    ?>
                </select>
            </div>
                <button type="submit" class="btn-submit"> Ajouter l'intervention</button>
        </form>
    </div>
</body>
</html>