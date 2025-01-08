<?php
require 'element/header.php';

session_start();
$_SESSION['error_message_pwd'] = "";
$_SESSION['attributes'] = "alert-danger";


require 'fonctions/connexion-bd.php';


$bdd= connexionBase();


if (isset($_POST['ok_pwd'])) {

    $email = $_SESSION['login_pwd_perdu'];

    if(preg_match('/(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{12,}/', $_POST['reboot_pwd'])){
        $password_reboot = password_hash(htmlentities($_POST['reboot_pwd'], ENT_QUOTES, 'UTF-8'), PASSWORD_DEFAULT);
    }else {
        $_SESSION['error_message_pwd'] = "Entrez un password valide";
        header("Location: form_new_pwd.php");
        exit;
    }

    if (isset($_POST['password_repeat_pwd']) && !empty($_POST['password_repeat_pwd'])){
        if ($_POST["reboot_pwd"] === $_POST["password_repeat_pwd"]) {

            $reboot_email = $bdd->prepare("UPDATE useraccount SET user_password = :newpwd WHERE user_email = :email");

            $reboot_email->execute(
                array(
                    'newpwd' => $password_reboot,
                    'email' => $email
                )
                );
            $reboot_email->closeCursor();

            $_SESSION['attributes'] = "alert-success";


            unset($_SESSION['error_message_email']);
            unset($_SESSION['login_pwd_perdu']);
        

            if(ini_get("session.use_cookies")){
                setcookie(session_name(), '', time()-42000);
            }
            session_destroy();

                
            header("Location: index.php");
            exit;

        }else{
            $_SESSION['error_message_pwd'] = "Vos passwords ne sont pas identiques";
            header("Location: form_new_pwd.php");
            exit;
        }
    }else {
        $_SESSION['error_message_pwd'] = "Entrez deux fois votre password";
        header("Location: form_new_pwd.php");
        exit;
    }                    
}


?>










