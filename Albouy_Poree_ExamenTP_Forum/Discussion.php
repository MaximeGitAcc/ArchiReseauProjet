<main>

    <?php
        // Connexion à la base de données
        $connexion = new PDO("mysql:host=localhost;dbname=forum;charset=utf8", "root", "");
        $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        ////////////// LE NOM  /////////////
        // Exécuter la requête SQL
        $sql = "SELECT * FROM discussion_jonction";
        $myresult = $connexion->query($sql);

        // Récupérer les données
        $i=0;
        while ($noms = $myresult->fetch(PDO::FETCH_ASSOC)) {
            $discussion[$i] =  $noms['noms'];
            //Les différents sujets sont alors exposés 
            ?><span><a class="sujets" id="<?php$discussion[$i]?>.php" href= "Discussion.php?sujet=<?php$i?>" ><?php echo $discussion[$i]?></a></span><?php
            $i++;
        }

        if $_COOKIE['sujet']
    ?>
        
</main>