<header>
    <video id="background-video" autoplay loop muted>
        <source src="Film de pub Minitel.mp4" type="video/mp4">
    </video>

    <div class="login-container">
        <?php if (isset($_COOKIE['username'])): ?>
            <p><?= htmlspecialchars($_COOKIE['username']); ?><form action="logout.php" method="post"><button type="submit" class="btn-hover">Déconnexion</button></form></p>
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
            <span><a href="#a_propos">A PROPOS</a></span>
            <span><a href="#produits">PRODUITS</a></span>
            <span><a href="#nous">NOUS</a></span>
            <span><a href="#contact">CONTACT</a></span>
        </div>
    </nav>

    <h1 id="title"></h1>

    <!-- Pop-up de connexion -->
    <div id="login-popup" class="popup">
        <div class="popup-content">
            <button id="btn-close-popup" class="btn-hover">&times;</button>
            <h2>Connexion</h2>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <br>
                <br>
                <br>
                <label for="password">Mot de passe :</label>
                <br>
                <input type="password" id="password" name="password" required>
                <br>
                <br>
                <br>
                <button type="submit" class="btn-hover">Se connecter</button>
                <p class="small-text">Pas encore de compte ? <a href="#" id="open-signup">S'inscrire</a></p>
            </form>
        </div>
    </div>

    <!-- Pop-up d'inscription -->
<div id="signup-popup" class="popup">
    <div class="popup-content">
        <button id="btn-close-signup" class="btn-hover">&times;</button>
        <h2>Inscription</h2>
        <form action="signup.php" method="post">
            <label for="new-username">Nom d'utilisateur :</label>
            <input type="text" id="new-username" name="new-username" required>
            <br>
            <br>
            <label for="new-password">Mot de passe :</label>
            <br>
            <input type="password" id="new-password" name="new-password" required>
            <br>
            <br>
            <label for="confirm-password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            <br>
            <br>
            <button type="submit" class="btn-hover">S'inscrire</button>
        </form>
        <p class="small-text">Déjà un compte ? <a href="#" id="open-login">Se connecter</a></p>
    </div>
</div>
</header>

<script>
document.addEventListener("DOMContentLoaded", function () {
    // Gestion du menu burger
    document.getElementById("burger-menu").addEventListener("click", function () {
        document.getElementById("nav-links").classList.toggle("show");
    });

    // Sélection des éléments
    const loginPopup = document.getElementById("login-popup");
    const signupPopup = document.getElementById("signup-popup");
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
