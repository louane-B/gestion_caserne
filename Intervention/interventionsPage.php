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
                        if ($caserneActuelle != $row["nom"]){
                            echo "</table><br>";
                        }
                        $caserneActuelle = $row["nom"];
                        echo "<h2>Caserne : " . $caserneActuelle . "</h2>";
                        echo "<table>";
                        echo "<tr>
                                <th>Adresse</th>
                                <th>Date et Heure</th>
                                <th>Type d'intervention</th>
                            </tr>";
                    ?>
                <?php endif; ?>
                <tr>
                    <td><?= $row["adresse"] ?></td>
                    <td><?= $row["dateTime"] ?></td>
                    <td><?= $row["type_intervention"] ?></td>
                </tr>
            <?php endforeach; ?>
                <?php
                if ($caserneActuelle != "") {
                    echo "</table>";
                }
                ?>
            <input type="hidden" id="id" name="id_intervention">
        </form>
        <br>
    </div>
</body>
</html>