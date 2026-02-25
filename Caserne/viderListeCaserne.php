<?php
include "../connexion.php";
$ins1 = $pdo->prepare("DELETE from intervention;");
$ins1->execute();
$ins2 = $pdo->prepare("DELETE  from caserne;");
if ($ins2->execute()) {
    echo "Suppression OK";
} else {
    echo "Erreur SQL";
}

header('Location: casernesPage.php')
?>