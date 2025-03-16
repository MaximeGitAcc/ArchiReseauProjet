<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Récupérer les données du formulaire
        $username = $_POST['username'];
        $password = $_POST['password'];
        var_dump($username, $password);

        // Vérification si l'utilisateur existe dans la base de données
        $stmt = $connexion->prepare("SELECT * FROM users WHERE Login = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Vérification du mot de passe avec password_verify
            if ($password == $user['Password']) {
                // Mot de passe correct, création du cookie pour l'utilisateur
                setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/"); // Le cookie dure 1 semaine
                header("Location: index.php"); // Rediriger vers la page d'accueil
                exit();
            } else {
                // Mot de passe incorrect
                header("Location: index.php?error=incorrect_password");
                exit();
            }
        } else {
            // Utilisateur introuvable
            header("Location: index.php?error=username_not_found");
            exit();
        }
    } catch (PDOException $e) {
        // En cas d'erreur avec la base de données
        header("Location: index.php?error=db_error");
        exit();
    }
}
?>
