<?php
include "../connexion.php";

$ins = $pdo->prepare("insert into intervention (adresse, dateTime, type_intervention, id_caserne) values (:adresse, :dateTime, :type_intervention, :id_caserne);");
$ins->execute(array(
    ":adresse"=>$_POST['adresse'],
    ":dateTime"=>$_POST['dateTime'],
    ":type_intervention"=>$_POST['type_intervention'],
    ":id_caserne"=>$_POST['id_caserne']
));

header('Location: interventionsPage.php');
?>