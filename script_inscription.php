<?php
session_start();
$_SESSION['connection'] = "false";
$_SESSION['error_message_inscription'] = "";




require 'fonctions/connexion-bd.php';

$bdd= connexionBase();


if (isset($_POST['ok']) ) {

    $_SESSION['lastname'] = isset($_POST['lastname']) ? trim(htmlentities($_POST['lastname'], ENT_QUOTES, 'UTF-8')) : "";
    $_SESSION['firstname'] = isset($_POST['firstname']) ? trim(htmlentities($_POST['firstname'], ENT_QUOTES, 'UTF-8')) : "";
    $_SESSION['email'] = isset($_POST['email']) ? trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8')) : "";

    if (!empty($_POST['lastname']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ-]*$/', $_POST['lastname'])){
        $lastname = trim(htmlentities($_POST['lastname'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message_inscription'] = "Entrez votre nom";
        header("Location: form_inscription.php");
        exit;
    }

    if (!empty($_POST['firstname']) && preg_match('/^[A-Za-zÀ-ÖØ-öø-ÿ-]*$/', $_POST['firstname'])){
        $firstname = trim(htmlentities($_POST['firstname'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message_inscription'] = "Entrez votre prénom";
        header("Location: form_inscription.php");
        exit;
    }

    if (!empty($_POST['email']) && filter_var(trim(htmlentities($_POST['email'])), FILTER_VALIDATE_EMAIL)) {
        $email = trim(htmlentities($_POST['email'], ENT_QUOTES, 'UTF-8'));
    }else {
        $_SESSION['error_message_inscription'] = "Entrez votre email";
        header("Location: form_inscription.php");
        exit;
    }

    if(preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{12,}/', $_POST['password'])){
        $password = password_hash(htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
    }else {
        $_SESSION['error_message_inscription'] = "Entrez un password valide";
        header("Location: form_inscription.php");
        exit;
    }

    if (isset($_POST['password_repeat']) && !empty($_POST['password_repeat'])){
        if ($_POST["password"] === $_POST["password_repeat"]) {

            $requete = $bdd->prepare("INSERT INTO useraccount (user_lastname, user_firstname, user_email, user_password) VALUES (:nom, :prenom, :email, :pwd)");


            $requete->execute(
                array(
                    'nom' => $lastname,
                    'prenom' => $firstname,
                    'email' => $email,
                    'pwd' => $password
                )
            );
        
            $requete->closeCursor();
        
            $_SESSION['user'] = $firstname;
            $_SESSION['connection'] = "true";
        
        
            header("Location: pageConnexion.php");
            exit;
        }else{
            $_SESSION['error_message_inscription'] = "Vos passwords ne sont pas identiques";
            $_SESSION['connection']= "false";
            header("Location: form_inscription.php");
            exit;
        }
    }else {
        $_SESSION['error_message_inscription'] = "Entrez deux fois votre password";
        header("Location: form_inscription.php");
        exit;
    }                    

}









