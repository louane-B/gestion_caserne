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

    $req = $pdo->prepare("SELECT i.id, i.adresse, i.dateTime, i.type_intervention, c.nom FROM intervention i Join caserne c ON i.id_caserne = c.id ORDER BY id;");
    $req->execute();
    $tab = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>

    <div class="contenu-page">
        <h1>La liste des Interventions de chaque caserne</h1>
        <form method="POST">
            <table>
                <tr>
                    <th>Adresse</th>
                    <th>dateTime</th>
                    <th>type_intervention</th>
                    <th>Caserne</th>
                </tr>
                <tr>
                <?php
                    for($i=0;$i<count($tab);$i++){
                        echo "<tr>";
                        echo "<td>" . $tab[$i]["adresse"] . "</td>";
                        echo "<td>" . $tab[$i]["dateTime"] . "</td>";
                        echo "<td>" . $tab[$i]["type_intervention"] . "</td>";
                        echo "<td>" . $tab[$i]["nom"] . "</td>";
                        echo "</tr>";
                    }
                ?>
                </tr>
            </table>
            <input type="hidden" id="id" name="id_intervention">
        </form>
        <br>
</body>
</html>