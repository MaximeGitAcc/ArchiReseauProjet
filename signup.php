<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $username = $_POST['new-username'];
    $password = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];
    $email = $_POST['new-email'];

    // Vérification que le mot de passe et sa confirmation sont identiques
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
        // Si l'utilisateur existe déjà
        header("Location: index.php?error=username_taken");
        exit;
    }

    // Hachage du mot de passe avant insertion
    $hashedPassword = sha1($password);

    // Insertion de l'utilisateur dans la base de données
    $stmt = $connexion->prepare("INSERT INTO users (Login, Password, Email) VALUES (:username, :password, :email)");
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $hashedPassword);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    // Vérification de l'insertion
    if ($stmt->rowCount() > 0) {
        // Succès de l'inscription
        setcookie("username", $username, time() + (7 * 24 * 60 * 60), "/");
        header("Location: index.php?success=registered");
        exit;
    } else {
        // Erreur d'insertion
        header("Location: index.php?error=insert_failed");
        exit;
    }

} catch (PDOException $e) {
    // En cas d'erreur avec la base de données
    header("Location: index.php?error=db_error");
    exit();
}
}
?>
