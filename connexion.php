<?php
try {
   $pdo = new PDO("mysql:host=localhost;dbname=qc_rescue","root","");
   $pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e){
    echo $e->getMessage();
}
?> 