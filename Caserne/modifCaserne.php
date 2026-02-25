<?php
include "../connexion.php";

$id = $_POST["id"];
$nom = $_POST["nom"];
$adresse = $_POST["adresse"];
$ville = $_POST["ville"];
$province = $_POST["province"];
$code_postal = $_POST["code_postal"];
$telephone = $_POST["telephone"];

$req = $pdo->prepare("UPDATE caserne SET nom = ?, adresse = ?, ville = ?, province = ?, code_postal = ?, telephone = ? WHERE id = ?");

$req->execute([$nom, $adresse, $ville, $province, $code_postal, $telephone, $id]);

header("Location: casernesPage.php");
?>