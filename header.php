<header>
    <video id="background-video" autoplay loop muted>
        <source src="Film de pub Minitel.mp4" type="video/mp4">
    </video>

    <div class="login-container">
        <?php if (isset($_COOKIE['username'])): ?>
            <p>👤 <?= htmlspecialchars($_COOKIE['username']); ?> | <a href="logout.php" class="btn-hover">Déconnexion</a></p>
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
            <button id="btn-close-popup" class="btn-hover">&times;</button>
            <h2>Connexion</h2>
            <form action="login.php" method="post">
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" id="username" name="username" required>
                <br>
                <br>
                <label for="password">Mot de passe :</label>
                <br>
                <input type="password" id="password" name="password" required>
                <br>
                <br>
                <br>
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
    const closeBtn = document.getElementById("btn-close-popup");

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
