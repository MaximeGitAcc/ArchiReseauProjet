<div id="produits">

<?php
try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    ////////////// LE NOM  /////////////
    // Exécuter la requête SQL
    $sql = "SELECT Name FROM products";
    $myresult = $connexion->query($sql);

    // Récupérer les données
    $i=0;
    while ($names = $myresult->fetch(PDO::FETCH_ASSOC)) {
        $NOM[$i] = $names['Name'];
        $i++;
    }

    ////////////// LE PRIX  /////////////
    $sql = "SELECT Price FROM products";
    $myresult = $connexion->query($sql);

    // Récupérer les données
    $i=0;
    while ($prices = $myresult->fetch(PDO::FETCH_ASSOC)) {
        $PRICE[$i] = $prices['Price'];
        $i++;
    }
    } 

    catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }



    
    ?>
            <h2>PRODUITS</h2>
            <section id="produit1">
                <img src="IA2.png" alt="Produit 1">
                <div class="description_produit">
                <p>Un produit alliant fiabilité et élégance, un outil design.<br> C'est le <span class="purple"> <?php echo $NOM[0]; ?></span>. </p>
                <p>Et avec un prix mini de <span class="purple"> <?php echo $PRICE[0]; ?> $</span>!! </p>
                </div>
            </section>
            <section id="produit2">
                <img src="IA3.JPG" alt="Produit 2">
                <div class="description_produit">
                    <p>Une technologie avancée pour révolutionner votre quotidien... <br> C'est le <span class="purple"> <?php echo $NOM[1]; ?></span>.</p>
                    <p>Et avec un prix mini de <span class="purple"><?php echo $PRICE[1]; ?> $</span>!! </p>
                </div>
            </section>
        </div>