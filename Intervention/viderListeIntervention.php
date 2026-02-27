<?php
include "../connexion.php";
$ins1 = $pdo->prepare("DELETE from intervention;");
if($ins1->execute()) {
    echo "Suppression OK";
} else {
    echo "Erreur SQL";
}

header('Location: interventionsPage.php');
?>