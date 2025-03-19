<header>

    <div class="login-container">
        <?php if (isset($_COOKIE['username'])): ?>
            <p><?= htmlspecialchars($_COOKIE['username']); ?><form action="logout.php" method="post"><button type="submit" class="btn-hover">Déconnexion</button></form></p>
        <?php else: ?>
            <button id="login-btn" class="btn-hover">Connexion</button>
        <?php endif; ?>
    </div>


    <!-- La barre de nav comprend les différents sujets de conversation -->
     <!--
    <nav>
        <?php
            // Connexion à la base de données
            $connexion = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // On va trouver les différentes discussions dans la base de données

            $sql = "SELECT * FROM discussion";
            $result = $connexion->query($sql);
            $i = 0;

            while ($row = mysqli_fetch_assoc($result)) {
                $discussion[$i] =  $row["nom"];
                $i+=1;
            }
            
        ?>
-->
        <!-- Les différents sujets sont alors exposés -->
         <!--
        <div id="nav-links" class="nav-links">
            <span><a href= "<?php$discussion[0]?>.php" ><?php echo $discussion[0]?></a></span>
            <span><a href="<?php$discussion[1]?>.php"><?php echo $discussion[1]?></a></span>
            <span><a href="<?php$discussion[2]?>.php"><?php echo $discussion[2]?></a></span>
            <span><a href="<?php$discussion[3]?>.php"><?php echo $discussion[3]?></a></span>
        </div>
    </nav>
-->
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
            <label for="new-login">Login :</label>
            <input type="text" id="new-login" name="new-login" required>
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
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" required>
            <br>
            <br>
            <label for="Prenom">Prénom :</label>
            <input type="text" id="Prenom" name="Prenom" required>
            <br>
            <br>
            <label for="Genre">Genre :</label>
            <select id="Genre" name="Genre" required>
                <option value="Femme">Femme</option>
                <option value="Homme" selected>Homme</option>
                <option value="Helicoptere">Helicoptère A320 de combat</option>
            </select>
            <br>
            <br>
            <label for="Service">Service :</label>
            <input type="text" id="Service" name="Service" required>
            <br>
            <br>
            <label for="Metier">Métier :</label>
            <input type="text" id="Metier" name="Metier" required>
            <br>
            <br>
            <label for="new-email">Email :</label>
            <br>
            <input type="email" id="new-email" name="new-email" required>
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
