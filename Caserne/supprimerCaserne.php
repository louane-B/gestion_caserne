<?php
include "../connexion.php";
$ins = $pdo->prepare("DELETE from caserne WHERE id=:id;");
$ins->execute([':id' => $_POST['id']]);
echo $_POST['id'];
header('Location: casernesPage.php');
?>