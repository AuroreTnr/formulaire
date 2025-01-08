<?php 

function connexionBase(){
    try {
        $bdd = new PDO('mysql:host=localhost;dbname=exercice_user;charset=utf8', 'admin', 'Afpa1234');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $bdd;
    } catch (Exception $e) {
        echo 'Erreur : ' . $e->getMessage() . "<br>";
        echo "N° : " . $e->getcode();
        die("Fin du script");
    }
}

