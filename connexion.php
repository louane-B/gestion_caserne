<?php
# connexion a la base de données MySQL avec PDO
try {
    # création de PDO avec host=localhost, dbname=qc_rescue, root qui correspond a l'identifiant pour se connecter a la base de donnée
   $pdo = new PDO("mysql:host=localhost;dbname=qc_rescue","root","");
   # Activation du mode Erreur pour savoir si il y a une erreur de connexion
   $pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    # le message d'erreur en cas d'érreur de connexion
    echo $e->getMessage();
}
?> 