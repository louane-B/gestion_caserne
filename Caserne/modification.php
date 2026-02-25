<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/pageStyle.css">
    <title>modification</title>
</head>
<body>
    <?php
    include "../connexion.php";
    include "../menu.php";
    $id = $_POST["id"];
    $req = $pdo->prepare("SELECT * FROM caserne WHERE id = ?");
    $req->execute([$id]);
    $caserne = $req->fetch(PDO::FETCH_ASSOC);
    ?>
    <div class="contenu-page">
        <h1>Modifier la caserne</h1>

        <form action="modifCaserne.php" method="POST" class="form-caserne">

            <input type="hidden" name="id" value="<?= $caserne['id'] ?>">

            <div class="form-group">
                <label>Nom :</label>
                <input type="text" name="nom" value="<?= $caserne['nom'] ?>" required>
            </div>
            <div class="form-group">
                <label>Adresse :</label>
                <input type="text" name="adresse" value="<?= $caserne['adresse'] ?>" required>
            </div>
            <div class="form-group">
                <label>Ville :</label>
                <input type="text" name="ville" value="<?= $caserne['ville'] ?>" required>
            </div>
            <div class="form-group">
                <label>Province :</label>
                <input types="text" name="province" value="<?= $caserne['province'] ?>" require>
            </div>
            <div class="form-group">
                <label>Code postal :</label>
                <input type="text" name="code_postal" value="<?= $caserne['code_postal'] ?>" required>
            </div>
            <div class="form-group">
                <label>Téléphone :</label>
                <input type="text" name="telephone" value="<?= $caserne['telephone'] ?>" required>
            </div>
        
            <button type="submit" class="btn-submit">Enregistrer les modifications</button>
        </form>
    </div>
</body>
</html>