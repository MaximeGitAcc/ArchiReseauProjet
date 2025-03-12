<?php
session_start();

// Vérifier si l'utilisateur est connecté via session ou cookie
if (!isset($_SESSION['username']) && isset($_COOKIE['username'])) {
    $_SESSION['username'] = $_COOKIE['username'];
}
?>

<header>
    <video id="background-video" autoplay loop muted>
        <source src="Film de pub Minitel.mp4" type="video/mp4">
    </video>

    <div class="login-container">
        <?php if (isset($_SESSION['username'])): ?>
            <p>👤 <?= htmlspecialchars($_SESSION['username']); ?> | <a href="logout.php" class="btn-hover">Déconnexion</a></p>
        <?php else: ?>
            <button id="login-btn" class="btn-hover">Connexion</button>
        <?php endif; ?>
    </div>

    <nav>
        <!-- Menu burger -->
        <div id="burger-menu" class="burger-menu">
            <div class="burger-icon"></div>
            <div class="burger-icon"></div>
            <div class="burger-icon"></div>
        </div>

        <!-- Menu de navigation -->
        <div id="nav-links" class="nav-links">
            <span><a href="#div1">A PROPOS</a></span>
            <span><a href="#div2">PRODUITS</a></span>
            <span><a href="#div3">NOUS</a></span>
            <span><a href="#contact">CONTACT</a></span>
        </div>
    </nav>

    <h1 id="title"></h1>

    <!-- Pop-up de connexion -->
    <div id="login-popup" class="popup">
        <div class="popup-content">
            <button class="close-btn">&times;</button>
            <h2>Connexion</h2>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                
                <label for="password">Mot de passe :</label>
                <input type="password" id="password" name="password" required>
                
                <button type="submit" class="btn-hover">Se connecter</button>
            </form>
        </div>
    </div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Gestion du menu burger
    document.getElementById("burger-menu").addEventListener("click", function () {
        document.getElementById("nav-links").classList.toggle("show");
    });

    // Gestion de la pop-up de connexion
    const loginBtn = document.getElementById("login-btn");
    const loginPopup = document.getElementById("login-popup");
    const closeBtn = document.querySelector(".close-btn");

    if (loginBtn) {
        loginBtn.addEventListener("click", function () {
            loginPopup.style.display = "block";
        });
    }

    if (closeBtn) {
        closeBtn.addEventListener("click", function () {
            loginPopup.style.display = "none";
        });
    }
});
</script>
