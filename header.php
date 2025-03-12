<header>
    <video id="background-video" autoplay loop muted>
        <source src="Film de pub Minitel.mp4" type="video/mp4">
    </video>
    <button id="login-btn" class="btn-hover">Connexion</button>
    <?php echo isset($_COOKIE['username']) ? "👤 " . htmlspecialchars($_COOKIE['username']) : "Connexion"; ?>
    <nav>
        <!-- Menu burger -->
        <div id="burger-menu" class="burger-menu" onclick="toggleMenu()">
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
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const burgerMenu = document.getElementById('burger-menu');
        const navLinks = document.getElementById('nav-links');

        burgerMenu.addEventListener("click", function() {
            navLinks.classList.toggle("show");
        });
    });
</script>

<!-- Pop-up de connexion -->
<div id="login-popup" class="popup">
    <div class="popup-content">
        <span class="close-btn">&times;</span>
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

<!-- Bouton de déconnexion -->
<?php if (isset($_COOKIE['username'])): ?>
    <form action="logout.php" method="post">
        <button type="submit" class="btn-hover">Déconnexion</button>
    </form>
<?php endif; ?>

</header>
