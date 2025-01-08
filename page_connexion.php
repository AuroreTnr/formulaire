<?php session_start();?>

<h1>Bienvenue sur ta page <?= $_SESSION['user'] ?></h1>

<a href="deconnection.php?action=deconnecter">Deconnexion</a>

<?php var_dump($_SESSION);?>