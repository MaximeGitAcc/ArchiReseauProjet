<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Supposons que la connexion réussit (à remplacer par une vraie vérification)
    $_SESSION['username'] = $username;
    setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");

    // 🔴 Ajoute cette ligne pour revenir sur index.php
    header("Location: index.php");
    exit();
}
?>
