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

            // Vérifie si le formulaire a été soumis
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérification si 'email' existe dans $_POST pour éviter l'undefined index
                $email = isset($_POST["email"]) ? $_POST["email"] : '';

                // Crée un cookie pour l'email, mais uniquement si un email a été soumis
                if (!empty($email)) {
                $nom_cookie = "email";
                $valeur_cookie = $email;
                $duree_cookie = time() + 6000;  // Le cookie expire dans 6000 secondes

                setcookie($nom_cookie, $valeur_cookie, $duree_cookie, "/");
                // Optionnellement, tu peux afficher une confirmation
                echo "Votre email a été enregistré.";
                }
            }
?>

</div>
