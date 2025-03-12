<?php
session_start();

// Supprimer le cookie
setcookie("username", "", time() - 3600, "/");

// Supprimer la session
session_destroy();

// Rediriger vers l'accueil
header("Location: index.php");
exit();
?>