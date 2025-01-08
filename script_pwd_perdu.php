<?php
require 'element/header.php';

session_start();
$_SESSION['error_message_email'] = "";
$_SESSION['attributes'] = "alert-danger";


require 'fonctions/connexion-bd.php';

$bdd= connexionBase();



if (isset($_POST)) {

    if (!empty($_POST['login_pwd_perdu']) && filter_var(trim(htmlentities($_POST['login_pwd_perdu'])), FILTER_VALIDATE_EMAIL)) {
        $email = trim(htmlentities($_POST['login_pwd_perdu'], ENT_QUOTES, 'UTF-8'));

        $find_user = $bdd->prepare("SELECT * FROM useraccount WHERE user_email = :email");
    
        $find_user->execute(
            array(
                ':email' => $email
            )
            );
        $user = $find_user->fetch(PDO::FETCH_OBJ);
        $find_user->closeCursor();


        if ($user) {

            $rebootLink = "http://127.0.0.1:8000/form_new_pwd.php";

            $to = htmlentities($user->user_email); 
            $subject = 'Mot de passe perdu';  
            $message = '
            <html>
                <body>
                    <p>Bonjour ' . $user->user_firstname . ' voici un lien pour réinitialiser votre mot de passe :</p> 
                    <p><a href="' . $rebootLink . '">réinitialiser</a></p>
                </body>
            </html>'; 

            $headers = 'MIME-Version: 1.0' . "\r\n" .
                        'Content-Type: text/html; charset=UTF-8' . "\r\n" .
                        'From: no-reply@votre-site.com' . "\r\n" .
                        'Reply-To: no-reply@votre-site.com' . "\r\n" .
                        'X-Mailer: PHP/' . phpversion();

            if (mail($to, $subject, $message, $headers)) {
                $_SESSION['error_message_email'] = "Un email avec un lien de réinitialisation de mot de passe a été envoyé.";
                $_SESSION['attributes'] = "alert-success";
                $_SESSION['login_pwd_perdu'] = $user->user_email;
                header("Location: form_pwd_perdu.php");
                exit;
            } else {
                $_SESSION['error_message_email'] = "Erreur lors de l'envoi de l'email.";
                header("Location: form_pwd_perdu.php");
                exit;
            }

    
        }else {

            $_SESSION['error_message_email'] = isset($_SESSION['error_message_email']) ? "Votre email n' apparaît pas dans la base de donnée, veuillez réessayer avec un email valide" : "";
            header("Location: form_pwd_perdu.php");
            exit;
        }

    }


}


?>


<?php echo "findUser : <br>";?>
<!-- <?php var_dump($find_user) ;?> -->
<?php echo "<br>";?>
<?php echo "User : <br>";?>
<!-- <?php var_dump($user) ;?> -->
<?php echo "<br>";?>


<?php require 'element/footer.php'; ?>






