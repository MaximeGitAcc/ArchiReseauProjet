<?php
try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Connexion réussie à la base de données."; // Vous pouvez enlever cette ligne une fois la connexion confirmée

    // Récupération des données du formulaire
    $username = $_POST['new-username'];
    $password = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];

    // Vérification que le mot de passe et la confirmation sont identiques
    if ($password !== $confirmPassword) {
        header("Location: index.php?error=password_mismatch");
        exit;
    }

    // Vérification si le nom d'utilisateur existe déjà
    $stmt = $connexion->prepare("SELECT COUNT(*) FROM users WHERE Login = :username");
    $stmt->bindParam(':username', $username);
    $stmt->execute();
    $count = $stmt->fetchColumn();

    if ($count > 0) {
        header("Location: index.php?error=username_taken");
        exit;
    }

    // Insertion du nouveau nom d'utilisateur et du mot de passe
    try {
        $stmt = $connexion->prepare("INSERT INTO users (Login, Password) VALUES (:username, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':password', $password); // Attention : mot de passe en clair, il serait préférable de le hacher
        $stmt->execute();
        
        if ($stmt->rowCount() > 0) {
            // Si l'utilisateur a bien été ajouté
            header("Location: index.php?success=registered");
            exit;
        } else {
            // Si l'insertion a échoué
            header("Location: index.php?error=insert_failed");
            exit;
        }

    } catch (PDOException $e) {
        // En cas d'erreur d'insertion dans la base de données
        header("Location: index.php?error=db_error");
        exit;
    }
} catch (PDOException $e) {
    // En cas d'erreur de connexion à la base de données
    header("Location: index.php?error=db_error");
    exit;
}
?>
