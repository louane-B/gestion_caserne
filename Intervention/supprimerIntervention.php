<?php
include "../connexion.php";
$ins = $pdo->prepare("DELETE FROM intervention WHERE id=:id;");
$ins->execute([':id' => $_POST['id_intervention']]);
echo $_POST['id_intervention'];
header('Location: interventionsPage.php');
?>