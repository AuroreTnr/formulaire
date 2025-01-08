<?php
require 'element/header.php';

session_start();

?>



<h1 class="text-center my-5">Mot de passe perdu</h1>

<?php echo "SESSION : <br>";?>
<?php var_dump($_SESSION);?>
<?php echo "<br>";?>

<?php echo "POST : <br>";?>
<?php var_dump($_POST);?>
<?php echo "<br>";?>

<form action="script_pwd_perdu.php" method="post">
    <div class="row g-3 align-items-center mb-4 mx-auto " style="max-width:700px;">
        <div class="alert <?php if (isset($_SESSION['attributes'])) {echo $_SESSION['attributes'];} ?>">
                <?php if (isset($_SESSION['error_message_email'])) { echo $_SESSION['error_message_email']; }?>
        </div>

        <div>
            <div class="col-auto">
                    <label class="col-form-label" for="email">Entrez votre email : *</label>
                </div>
            <div class="col-auto">
                <input type="email" name="login_pwd_perdu" class="d-block mb-2 form-control" id="email" required>
            </div>
        </div>

        <input class="btn btn-primary" type="submit" value="Envoyer" name="ok_email">

        <a href="index.php">Retourner à la page d' authentification</a>
    </div>

</form>



<?php require 'element/footer.php'; ?>






