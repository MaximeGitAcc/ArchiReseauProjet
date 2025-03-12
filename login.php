<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // Vérification simplifiée (remplacer par une vraie vérification)
    if ($username == "admin" && $password == "password") {
        // Créer un cookie avec le nom d'utilisateur
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/"); // Le cookie expire dans 7 jours
        header("Location: index.php"); 
        exit();
    } else {
        echo "Nom d'utilisateur ou mot de passe incorrect.";&
    }
}
?>



