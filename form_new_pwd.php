<?php
require 'element/header.php';

session_start();

require 'fonctions/connexion-bd.php';


?>

<h1 class="text-center my-5">Réinitialiser votre mot de passe</h1>

<?php echo "SESSION : " ?>
<?php var_dump($_SESSION); ?>

<?php echo "<br> POST : " ?>
<?php var_dump($_POST); ?>



<form action="script_new_pwd.php" method="post">

    <div class="row g-3 align-items-center mb-4 mx-auto " style="max-width:700px;">
        <div class="alert <?php if (isset($_SESSION['error_message_pwd'])) {echo $_SESSION['attributes'];} ?>">

            <?php if (isset($_SESSION['error_message_pwd'])) { echo $_SESSION['error_message_pwd']; }?>

        </div>
    

        <div>
            <div class="col-auto">  
                <label class="col-form-label" for="reboot_pwd">Entrez un nouveau mot de passe : *</label>
            </div>
            <div class="col-auto" >
                <input class="form-control" type="password" name="reboot_pwd" id="reboot_pwd" required>
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">Il doit contenir au moins 12 caractères, des minuscules, des majuscules, des chiffres et des caractères spéciaux</span>
            </div>
        </div>

        <div>
            <div class="col-auto">
                <label class="col-form-label" for="password">Entrez de nouveau votre nouveau mot de passe : *</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="password" name="password_repeat_pwd" id="password" required>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Envoyer" name="ok_pwd">
    </div>


</form>



<?php require 'element/footer.php'; ?>






