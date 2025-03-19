<div id="signup-popup" class="popup">
    <div class="popup-content">
        <h2>Inscription</h2>
        <form action="signup.php" method="post">
            <label for="Nom">Nom :</label>
            <input type="text" id="Nom" name="Nom" required>
            <br>
            <br>
            <label for="Prenom">Prénom :</label>
            <input type="text" id="Prenom" name="Prenom" required>
            <br>
            <br>
            <label for="new-password">Mot de passe :</label>
            <input type="password" id="new-password" name="new-password" required>
            <br>
            <br>
            <label for="confirm-password">Confirmer le mot de passe :</label>
            <input type="password" id="confirm-password" name="confirm-password" required>
            
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
            <label for="Age">Age :</label>
            <input type="number" id="Age" name="Age" required>
            <br>
            <br>
            <label for="Service">Service :</label>
            <select id="Service" name="Service" required>
                <option value="Compta">Comptabilité</option>
                <option value="RH" selected>RH</option>
                <option value="Prod">Production</option>
                <option value="Direction">Direction</option>
                <option value="Achats" selected>Achats</option>
                <option value="Developpement">Developpement</option>
            </select>
            <br>
            <br>
            <label for="Metier">Métier :</label>
            <input type="text" id="Metier" name="Metier" required>
            <br>
            <br>
            <button type="submit" >S'inscrire</button>
        </form>
    </div>
</div>