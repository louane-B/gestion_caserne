<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/pageStyle.css">
    <title>casernes</title>
</head>
<body>
     <?php
    include "../connexion.php";
    include "../menu.php";

    $req = $pdo->prepare("SELECT id, nom, adresse, ville, province, code_postal, telephone FROM caserne ORDER BY id;");
    $req->execute();
    $tab = $req->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <div class="contenu-page">
        <h1>La liste  des casernes de pompiers du Québec</h1>
        <form method="POST">
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Province</th>
                    <th>code postal</th>
                    <th>Téléphone</th>
                </tr>
                    <?php
                        for($i=0;$i<count($tab);$i++){
                            echo "<tr>";
                            echo "<td>" . $tab[$i]["nom"] . "</td>";
                            echo "<td>" . $tab[$i]["adresse"] . "</td>";
                            echo "<td>" . $tab[$i]["ville"] . "</td>";
                            echo "<td>" . $tab[$i]["province"] . "</td>";
                            echo "<td>" . $tab[$i]["code_postal"] . "</td>";
                            echo "<td>" . $tab[$i]["telephone"] . "</td>";
                        }
                    ?>
                </tr>
            </table>
            <input type="hidden" id="id_garderie" name="id_garderie">
        </form>
        <br/>
        <br/>
        <br/>
    </div>
</body>
</html>