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
    </div>
</div>