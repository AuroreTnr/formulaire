<?php
session_start();

$_SESSION['connection'] = "false";
$_SESSION['error_message'] = "";

$login = htmlentities($_POST['login'], ENT_QUOTES, 'UTF-8');
$password = htmlentities($_POST['password'], ENT_QUOTES, 'UTF-8');

if (empty($_POST['login']) || empty($_POST['password'])) {
    die('Login ou mot de passe manquant');
}
require 'fonctions/connexion-bd.php';


$bdd= connexionBase();

$requete = $bdd->prepare("SELECT * FROM useraccount WHERE user_email = :identifiant");
$requete->execute(array(
    ':identifiant' => $login
));

$user = $requete->fetch(PDO::FETCH_ASSOC);
var_dump($user);

if ($user) {
    if (password_verify($password, $user['user_password'])) {
        $_SESSION['connection'] = "true";
        $_SESSION['user'] = $user['user_firstname'];
        header("Location: page_connexion.php");
        exit;

    }else{
        $_SESSION['error_message'] = "Votre login ou votre password n' est pas correct";
        header("Location: index.php");
        exit;
    }
    
}else {
    $_SESSION['error_message'] = "Votre login ou votre password n' est pas correct";
    header("Location: index.php");
    exit;
}

?>