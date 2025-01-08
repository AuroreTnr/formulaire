<?php 
session_start();
$attributes = "alert-danger";

require 'element/header.php';?>

<h1 class="text-center p-5">Formulaire d' inscription</h1>


<form action="script_inscription.php" method="post" class="mx-auto " style="max-width:700px;" >
    <div class="alert <?php if (isset($_SESSION['error_message_inscription'])) {echo $attributes;} ?>">
        <?php if (isset($_SESSION['error_message_inscription'])) { echo $_SESSION['error_message_inscription']; }?>
    </div>
    
    <div class="row g-3 align-items-center mb-4">
        <div>
            <div class="col-auto">
                <label class="col-form-label" for="lastname">Entrez votre nom : *</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="text" name="lastname" id="lastname" value="<?php echo isset($_SESSION['lastname']) ? htmlentities($_SESSION['lastname']) : ''; ?>">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text"></span>
            </div>
        </div>

        <div>
            <div class="col-auto">
                <label class="col-form-label" for="firstname">Entrez votre prénom : *</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="text" name="firstname" id="firstname" value="<?php echo isset($_SESSION['firstname']) ? htmlentities($_SESSION['firstname']) : ''; ?>">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text"></span>
            </div>
        </div>

        <div>
            <div class="col-auto">
                <label class="col-form-label" for="email">Entrez votre email : *</label>
            </div>
            <div class="col-auto">
                <input class="form-control" type="email" name="email" id="email" value="<?php echo isset($_SESSION['email']) ? htmlentities($_SESSION['email']) : ''; ?>">
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text"></span>
            </div>
        </div>

        <div>
            <div class="col-auto">
                <label class="col-form-label" for="password">Entrez votre password : *</label>
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text">Il doit contenir au moins 12 caractères, des minuscules, des majuscules, des chiffres et des caractères spéciaux</span>
            </div>
            <div class="col-auto">
                <input class="form-control" type="password" name="password" id="password">
            </div>
        </div>

        <div>
            <div class="col-auto">
                <label class="col-form-label" for="password">Entrez de nouveau votre password : *</label>
            </div>
            <div class="col-auto">
                <span id="passwordHelpInline" class="form-text"></span>
            </div>
            <div class="col-auto">
                <input class="form-control" type="password" name="password_repeat" id="password">
            </div>
        </div>

    </div>

    <input class="btn btn-primary" type="submit" value="S' inscrire" name="ok">

    <div class="mt-3"><a href="index.php">j' ai déjà un compte</a></div>
</form>

<?php echo "POST : "?>
<?php var_dump($_POST) ?>
<?= "<br>" ?>
<?php echo "SESSION : "?>
<?php var_dump($_SESSION) ?>

<?php require 'element/footer.php';?>




<!--

- securiser la session (Trop compliqué pour moi pour l instant, il faut que je comprenne mieux les sessions)

-->




