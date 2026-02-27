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
            <!-- les titres du tableau -->
            <table>
                <tr>
                    <th>Nom</th>
                    <th>Adresse</th>
                    <th>Ville</th>
                    <th>Province</th>
                    <th>code postal</th>
                    <th>Téléphone</th>
                    <th>         </th>
                    <th>         </th>
                </tr>
                    <?php
                        # la boucle for qui lie tout le tableau ligne par ligne 
                        for($i=0;$i<count($tab);$i++){
                            echo "<tr>";
                            echo "<td>" . $tab[$i]["nom"] . "</td>";
                            echo "<td>" . $tab[$i]["adresse"] . "</td>";
                            echo "<td>" . $tab[$i]["ville"] . "</td>";
                            echo "<td>" . $tab[$i]["province"] . "</td>";
                            echo "<td>" . $tab[$i]["code_postal"] . "</td>";
                            echo "<td>" . $tab[$i]["telephone"] . "</td>";
                            # bouton modifier qui récupère l'id concerner pour pouvoir récupérer les donner de la caserne a modifier
                            echo '<td><input value="Modifier" type="Button" onclick="document.getElementById(\'id\').value=\'' . $tab[$i]["id"] . '\'; this.form.action = \'modification.php\'; this.form.method = \'POST\'; this.form.submit();"></td>';
                            # bouton supprimer avec un onglet qui s'affiche pour demander si on est sur de vouloir l'éffacer
                            echo '<td><input value="Supprimer" type="button" onclick="if (confirm(\'Voulez-vous vraiment supprimer : ' . $tab[$i]["nom"].'?\')) {document.getElementById(\'id\').value = \'' . $tab[$i]["id"] . '\'; this.form.action =\'supprimerCaserne.php\'; this.form.method = \'POST\'; submit();}"></td>';
                            echo "</tr>";
                        }
                    ?>
                </tr>
            </table>
            <!-- l'id cacher qui est envoyer du formulaire du tableaux pour le form ajouter, supprimer et modifier -->
            <input type="hidden" id="id" name="id">
        </form>
        <br/>
        <!-- bouton pour vider tout la liste -->
        <form action="viderListeCaserne.php" method="POST">
                <button type="submit" class="btn-submit">Vider</button>
        </form>
        <br/>
        <br/>
        <br/>
        <!-- le formulaire pour ajouter une nouvelle caserne -->
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