<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="ALBOUY Maxime ; PORÉE Gaël">
    <link rel="icon" href="20211021_151048.jpg">
    <link rel="stylesheet" href="CSS.css">
    <title>Mégatel</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let title = document.getElementById("title");
            let text = "MEGATEL";
            let index = 0;

            if (!title.dataset.animated) { 
                function typeWriter() {
                    if (index < text.length) {
                        title.innerHTML += text.charAt(index);
                        index++;
                        setTimeout(typeWriter, 300);
                    }
                }
                title.innerHTML = "";
                title.dataset.animated = "true"; 
                typeWriter();
            }
        });

        window.addEventListener('scroll', function() {
            let produit = document.querySelector('#produit1 img');
            let description = document.querySelector('#produit1 .description_produit');
            let produitBox = document.querySelector('#produit1').getBoundingClientRect();
            let windowHeight = window.innerHeight;
            let scrollAmount = (windowHeight - produitBox.top) / windowHeight;
        });
    </script>
</head>
<body>

<?php
        include("header.php");

        // Afficher les erreurs de connexion dans le pop-up si présentes
    if (isset($_GET['error'])) {
        $errorMessage = '';
        if ($_GET['error'] == "incorrect_password") {
            $errorMessage = "❌ Mot de passe incorrect.";
        } elseif ($_GET['error'] == "username_not_found") {
            $errorMessage = "❌ L'utilisateur n'existe pas.";
        } elseif ($_GET['error'] == "db_error") {
            $errorMessage = "❌ Erreur de base de données. Réessayez plus tard.";
        } elseif ($_GET['error'] == "password_mismatch") {
            $errorMessage = "❌ Les mots de passe ne correspondent pas.";
        } elseif ($_GET['error'] == "username_taken") {
            $errorMessage = "❌ Ce nom d'utilisateur est déjà pris.";
        }

        // Passer l'erreur à JavaScript pour l'afficher dans le pop-up
        echo "<script>
                document.addEventListener('DOMContentLoaded', function () {
                    const errorMessage = '" . addslashes($errorMessage) . "';
                    if (errorMessage) {
                        const errorContainer = document.createElement('p');
                        errorContainer.style.color = 'red';
                        errorContainer.innerHTML = errorMessage;
                        const popupContent = document.querySelector('#signup-popup .popup-content');
                        
                        // Supprimer les anciennes erreurs pour éviter des doublons
                        const existingErrors = popupContent.querySelectorAll('p');
                        existingErrors.forEach(function(error) {
                            error.remove();
                        });

                        popupContent.prepend(errorContainer);
                    }
                });
            </script>";
    }
        
    ?>

    <?php
        include("main.php")
    ?>

    <?php
        include("footer.php")
    ?>
    
</body>
</html>

<script>
        document.addEventListener("DOMContentLoaded", function () {
        const loginPopup = document.getElementById("login-popup");
        const signupPopup = document.getElementById("signup-popup");
        
        // Fermer la pop-up de connexion ou d'inscription si elles sont visibles au rechargement de la page
        if (loginPopup && loginPopup.style.display !== "none") {
            loginPopup.style.display = "none";
        }
        if (signupPopup && signupPopup.style.display !== "none") {
            signupPopup.style.display = "none";
        }

        // Ton code existant pour gérer les interactions avec les pop-ups (ouverture/fermeture)
        const openSignup = document.getElementById("open-signup");
        const openLogin = document.getElementById("open-login");
        const closeLogin = document.getElementById("btn-close-popup");
        const closeSignup = document.getElementById("btn-close-signup");
        const loginBtn = document.getElementById("login-btn");

        // Ouvrir la pop-up de connexion
        if (loginBtn) {
            loginBtn.addEventListener("click", function () {
                loginPopup.style.display = "block";
            });
        }

        // Ouvrir la pop-up d'inscription depuis la connexion
        if (openSignup) {
            openSignup.addEventListener("click", function (event) {
                event.preventDefault();
                loginPopup.style.display = "none";
                signupPopup.style.display = "block";
            });
        }

        // Ouvrir la pop-up de connexion depuis l'inscription
        if (openLogin) {
            openLogin.addEventListener("click", function (event) {
                event.preventDefault();
                signupPopup.style.display = "none";
                loginPopup.style.display = "block";
            });
        }

        // Fermer les pop-ups
        if (closeLogin) {
            closeLogin.addEventListener("click", function () {
                loginPopup.style.display = "none";
            });
        }

        if (closeSignup) {
            closeSignup.addEventListener("click", function () {
                signupPopup.style.display = "none";
            });
        }
    });

</script>
