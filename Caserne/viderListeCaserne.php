<?php
include "../connexion.php";
# supprimer les intervention avant de pouvoir supprimer les casernes a cause de la clé étrangère
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