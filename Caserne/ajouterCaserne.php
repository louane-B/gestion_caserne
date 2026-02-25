<?php
    include "../connexion.php";
    $ins = $pdo->prepare("insert into caserne (nom,adresse,ville,province,code_postal,telephone) values (:nom,:adresse,:ville,:province,:code_postal,:telephone)");
    $ins->execute(array(
        ":nom"=>$_POST['nom'],
        ":adresse"=>$_POST['adresse'],
        ":ville"=>$_POST['ville'],
        ":province"=>$_POST['province'],
        ":code_postal"=>$_POST['code_postal'],
        ":telephone"=>$_POST['telephone']
        ));
    header('Location: casernesPage.php');
?>