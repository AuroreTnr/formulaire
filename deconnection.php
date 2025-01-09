<?php
/**
 * Suppression des sessions
 */
if($_SERVER['REQUEST_URI'] === "/deconnection.php?action=deconnecter"){
    unset($_SESSION['lastname']);
    unset($_SESSION['firstname']);
    unset($_SESSION['email']);
    unset($_SESSION['user']);
    unset($_SESSION['connection']);
    unset($_SESSION['error_message']);
    unset($_SESSION['error_message_inscription']);

    if(ini_get("session.use_cookies")){
        setcookie(session_name(), '', time()-42000);
    }
    session_destroy();

    header("Location: ../index.php");
    exit;
}

var_dump($_GET);