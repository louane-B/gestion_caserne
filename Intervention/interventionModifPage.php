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
    ?>
</body>
</html>