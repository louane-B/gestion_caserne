<?php
include "../connexion.php";
# suppression de la table intervention qui sont liée a l'id de la caserne car l'id de la caserne est la clè étrangère dans intervention
# on ne peut pas supprimer une caserne sans supprimer ses intervention avant
$ins = $pdo->prepare("DELETE FROM intervention WHERE id_caserne=:id;");
$ins->execute([':id' => $_POST['id']]);
$ins = $pdo->prepare("DELETE from caserne WHERE id=:id;");
$ins->execute([':id' => $_POST['id']]);
echo $_POST['id'];

header('Location: casernesPage.php');
?>