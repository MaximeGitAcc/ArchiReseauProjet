<?php
// Supprimer le cookie de connexion
setcookie("username", "", time() - 3600, "/"); // Expire immédiatement
header("Location: index.php"); // Rediriger vers la page d'accueil
exit();
?>
