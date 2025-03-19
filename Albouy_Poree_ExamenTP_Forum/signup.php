<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Récupération des données du formulaire
    $password = $_POST['new-password'];
    $confirmPassword = $_POST['confirm-password'];
    $nom = $_POST['Nom'];
    $prenom = $_POST['Prenom'];
    $genre = $_POST['Genre'];
    $age = abs($_POST['Age']);
    $service = $_POST['Service'];
    $metier = $_POST['Metier'];

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

    // Création de l'email
    $email = $prenom[0].$nom."@forumesn.com";


    // Création du login
    $login = $prenom[0].$nom;
    $hashedlogin = sha1($login);

    // Hachage du mot de passe avant insertion
    $hashedPassword = sha1($password);

    // Insertion de l'utilisateur dans la base de données
    // $stmt = $connexion->prepare("INSERT INTO users (Login, Password, nom, prenom, genre, age, service, metier, email) VALUES (:username, :password, :nom, :prenom, :genre, :age, :service, :metier, :email)");
    // $stmt->bindParam(':username', $hashedlogin);
    // $stmt->bindParam(':password', $hashedPassword);
    // $stmt->bindParam(':nom', $nom);
    // $stmt->bindParam(':prenom', $prenom);
    // $stmt->bindParam(':genre', $genre);
    // $stmt->bindParam(':age', $age);
    // $stmt->bindParam(':service', $service);
    // $stmt->bindParam(':metier', $metier);
    // $stmt->bindParam(':email', $email);
    // $count = $stmt->fetchColumn();
    // $stmt->execute();



    $sql = "INSERT INTO utilisateurs (Login, Password, nom, prenom, genre, age, service, metier, email) VALUES ($hashedlogin, $hashedPassword, $nom, $prenom, $genre, $age, $service, $metier, $email)";
    echo $sql;
    $connexion->query($sql);


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
