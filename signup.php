<?php

    try {
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        
        // Vérification de la connexion
        echo "Connexion réussie à la base de données.";        

        // Récupération des données du formulaire
        $username = $_POST['new-username'];
        $password = $_POST['new-password'];
        $confirmPassword = $_POST['confirm-password'];

        if ($password !== $confirmPassword) {
            header("Location: index.php?error=password_mismatch");
            exit;
        }
        
        $stmt = $connexion->prepare("SELECT COUNT(*) FROM users WHERE Login = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if ($count > 0) {
            header("Location: index.php?error=username_taken");
            exit;
        }
        
        try {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $connexion->prepare("INSERT INTO users (Login, Password) VALUES (:username, :password)");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':password', $hashedPassword);
            $stmt->execute();
            
            if ($stmt->rowCount() > 0) {
                echo "L'utilisateur a été ajouté avec succès.";
            } else {
                echo "L'ajout de l'utilisateur a échoué.";
            }            
        
            header("Location: index.php?success=registered");
            exit;
        } catch (PDOException $e) {
            header("Location: index.php?error=db_error");
            exit;
        }
    }
    catch (PDOException $e) {
        header("Location: index.php?error=db_error");
        exit;
    }
?>
