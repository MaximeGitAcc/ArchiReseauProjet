<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Vérification simplifiée (remplacer par une vraie vérification)
    if ($username == "admin" && $password == "password") {
        // Créer un cookie avec le nom d'utilisateur
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        header("Location: index.php"); 
        exit();
    } else {
        header("Location: index.php");
    }
}
?>



