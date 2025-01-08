<?php
session_start();
require 'element/header.php'
?>


<h1 class="text-center mt-5">Connexion</h1>

<?php var_dump($_SESSION); ?>


<form action="script_index_connexion.php" method="post" class="m-4 mx-auto border border-black border-2 rounded" style="max-width: 500px;">
<?php
if (!empty($_SESSION['error_message'])) {
    echo "<div class='alert alert-danger'>" . $_SESSION['error_message'] . "</div>";
    unset($_SESSION['error_message']);
}
?>
    <div class="p-3 d-flex flex-column" style="height:320px;">
        
        <input type="email" placeholder="Entrez votre email" name="login" class="d-block mb-2 form-control" required>
        <input type="password" placeholder="Entrez votre password" class="d-block mb-2 form-control" name="password" required>

        <div class="d-flex flex-column mt-auto gap-2">
            <a href="form_inscription.php" class="d-block btn btn-link btn-light border-primary">Créer un compte</a>
            <button type="submit" class="btn btn-primary">Connection</button>
            <a href="form_pwd_perdu.php" class="d-block text-center text-secondary my-3">J' ai oublié mon mot de passe</a>
        </div>
    </div>
</form>

<?php require 'element/footer.php'; ?>
