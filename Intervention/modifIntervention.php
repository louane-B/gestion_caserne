<?php
include "../connexion.php";

$id = $_POST['id_intervention'];
$adresse = $_POST['adresse'];
$dateTime = $_POST['dateTime'];
$type_intervention = $_POST['type_intervention'];
$id_caserne = $_POST['id_caserne'];

$req = $pdo->prepare("UPDATE intervention SET adresse = ?, dateTime = ?, type_intervention = ?, id_caserne = ? where id = ?");

$req->execute([$adresse, $dateTime, $type_intervention, $id_caserne, $id]);

header('Location: interventionsPage.php');
?>