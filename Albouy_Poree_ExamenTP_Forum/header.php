<header>
<div class="login-container">
        <?php if (isset($_COOKIE['username'])): ?>
            <p><?= htmlspecialchars($_COOKIE['username']); ?><form action="logout.php" method="post"><button type="submit" class="btn-hover">Déconnexion</button></form></p>
        <?php else: ?>
            <form action="login.php" method="post">
                <label for="username">Login :</label>
                <br>
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
            </form>
            <form action="inscription.php" method="post">
            <button type="submit" class="btn-hover">Inscription</button>
            </form>
        <?php endif; ?>
    </div>

    <!-- La barre de nav comprend les différents sujets de conversation -->
    <nav>
        <?php
            // Connexion à la base de données
            $connexion = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
            $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            ////////////// LE NOM  /////////////
            // Exécuter la requête SQL
            $sql = "SELECT noms FROM sujets";
            $myresult = $connexion->query($sql);

            // Récupérer les données
            $i=0;
            while ($noms = $myresult->fetch(PDO::FETCH_ASSOC)) {
                $discussion[$i] =  $noms['noms'];
                //Les différents sujets sont alors exposés 
                ?><span><a class="sujets" id="<?php$discussion[$i]?>.php" href= "Discussion.php?sujet=<?php$i?>" ><?php echo $discussion[$i]?></a></span><?php
                $i++;
            }

        ?>

        <script>
            const sujet = document.getElementsByClassName("sujets");

            if (sujet) {
                sujet.addEventListener("click", function () {
                    <?php setcookie("sujet", $username, time() + (7 * 24 * 60 * 60), "/"); // Le cookie dure 1 semaine?>
                });
            }

        </script>
        

    </nav>
    <h1 id="title"></h1>

</header>

