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
                    <th>         </th>
                    <th>
                        <form action="viderListeCaserne.php" methode="POST">
                            <input type="submit" value="vider">
                        </form>
                    </th>
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
                            echo '<td><input value="Modifier" type="Button" onclick="document.getElementById(\'id\').value=\'' . $tab[$i]["id"] . '\'; this.form.action = \'modification.php\'; this.form.method = \'POST\'; this.form.submit();"></td>';
                        }
                    ?>
                </tr>
            </table>
            <input type="hidden" id="id" name="id">
        </form>
        <br/>
        <br/>
        <br/>
        <h1>Inscrire une nouvelle caserne</h1>
        <form action="ajouterCaserne.php" method="POST" class="form-caserne">
                <div class="form-group">
                    <label> Nom :</label>
                    <input type="text" name="nom" required>
                </div>
                <div class="form-group">
                    <label> Adresse : </label>
                    <input type="text" name="adresse" require>
                </div>
                <div class="form-group">
                    <label> Ville : </label>
                    <input type="text" name="ville" required>
                </div>
                <div class="form-group">
                    <label> Province : </label>
                    <input type="text" name="province" required>
                </div>
                <div class="form-group">
                    <label> Code_postal : </label>
                    <input type="text" name="code_postal" required>
                </div>
                <div class="form-group">
                    <label> telephone : </label>
                    <input type="text" name="telephone" required>
                </div>
                    <button type="submit" class="btn-submit">Inscription</button>
        </form>
    </div>
</body>
</html>