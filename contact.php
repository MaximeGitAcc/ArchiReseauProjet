<div id="contact">
            <h2>Contact</h2>
            <form method = "post">
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" id="btn-contact" class="btn-hover">Envoyer</button>
            </form>
            <?php
            
                $nom_cookie = "email";
                $valeur_cookie = $_POST["email"];
                $duree_cookie = time()+ 6000;

                setcookie($nom_cookie,$valeur_cookie,$duree_cookie,"/");
                //echo "Votre email est ".$_COOKIE["email"];
            ?>

        </div>