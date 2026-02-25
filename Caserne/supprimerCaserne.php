<?php
include "../connexion.php";
echo $_POST['id'];
$ins = $pdo->prepare("DELETE FROM intervention WHERE id_caserne = :id")->execute([':id' => $_POST['id']]);

$ins = $pdo->prepare("DELETE from caserne WHERE id=:id;")->execute([':id' => $_POST['id']]);

header('Location: casernesPage.php');
?>