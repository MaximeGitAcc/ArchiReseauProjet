<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = htmlspecialchars($_POST['username']);
    $password = $_POST['password']; // ⚠️ Normalement, il faudrait vérifier avec une base de données
    
    // Vérification basique (ajoute une vraie vérification en base de données si nécessaire)
    if ($username === "admin" && $password === "1234") {
        // Créer un cookie qui expire dans 7 jours
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        
        // Stocker aussi en session
        $_SESSION['username'] = $username;
        
        // Rediriger vers l'accueil
        header("Location: index.php");
        exit();
    } else {
        echo "Identifiants incorrects.";
    }
}
?>