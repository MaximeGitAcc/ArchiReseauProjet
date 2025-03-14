<div id="produits">

<?php
try {
    // Connexion à la base de données
    $connexion = new PDO("mysql:host=localhost;dbname=megatel;charset=utf8", "root", "");
    $connexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Exécuter la requête SQL
    $sql = "SELECT Name FROM products LIMIT 1";
    $myresult = $connexion->query($sql);

    // Récupérer les données
    while ($names = $myresult->fetch(PDO::FETCH_ASSOC)) {
        $NOM = $names['Name'];
    }
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }
    ?>
            <h2>PRODUITS</h2>
            <section id="produit1">
                <img src="IA2.png" alt="Produit 1">
                <div class="description_produit">
                    <p>Un produit alliant fiabilité et élégance, un outil design.<br> C'est le <?php echo $NOM; ?>. </p>
                </div>
            </section>
            <section id="produit2">
                <img src="IA3.png" alt="Produit 2">
                <div class="description_produit">
                    <p>Une technologie avancée pour révolutionner votre quotidien...</p>
                </div>
            </section>
        </div>