<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="ALBOUY Maxime ; PORÉE Gaël">
    <link rel="icon" href="20211021_151048.jpg">
    <link rel="stylesheet" href="CSS.css">
    <title>Mégatel</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let title = document.getElementById("title");
            let text = "MEGATEL";
            let index = 0;
            function typeWriter() {
                if (index < text.length) {
                    title.innerHTML += text.charAt(index);
                    index++;
                    setTimeout(typeWriter, 300);
                }
            }
            title.innerHTML = "";
            typeWriter();
        });

        window.addEventListener('scroll', function() {
            let produit = document.querySelector('#produit1 img');
            let description = document.querySelector('#produit1 .description_produit');
            let produitBox = document.querySelector('#produit1').getBoundingClientRect();
            let windowHeight = window.innerHeight;
            let scrollAmount = (windowHeight - produitBox.top) / windowHeight;
            if (scrollAmount >= 0 && scrollAmount <= 1) {
                let translateValue = scrollAmount * 100;
                produit.style.transform = `translateX(${translateValue}px)`;
                description.style.transform = `translateX(${translateValue}px)`;
            }
        });
    </script>
</head>
<body>
    <header>
        <video id="background-video" autoplay loop muted>
            <source src="Film de pub Minitel.mp4" type="video/mp4">
        </video>
        <nav>
            <span><a href="#div1">A PROPOS</a></span>
            <span><a href="#div2">PRODUITS</a></span>
            <span><a href="#div3">NOUS</a></span>
            <span><a href="#contact">CONTACT</a></span>
        </nav>
        <h1 id="title"></h1>
    </header>
    <main>
        <div id="div1">
            <h2>A PROPOS</h2>
            <p>Chaque jour qui passe, une page se tourne. Mais le livre, lui, ne disparaît pas. Il se saisi chaque jour de nouvelles aventures, de nouveaux paradoxes, de nouvelles technologies ... 
                <br>C'est pris par ce flux infernale que nous avons décidé de nous s'arrêter un instant. Une pause dans l'Univers, un moment dans l'infini. Cet instant, nous ne l'avons pas choisi par hasard. Il incarne la magie. Il incarne à la fois le passé et le nouveau. 
                <br>C'est l'ère du Minitel. 
                <br>Un appareil simple, robuste 
            </p>
        </div>
        <div id="div2">
            <h2>PRODUITS</h2>
            <section id="produit1">
                <img src="IA2.png" alt="Produit 1">
                <div class="description_produit">
                    <p>Lorem ipsum dolor sit amet consectetur...</p>
                    <button class="btn-hover">En savoir plus</button>
                </div>
            </section>
            <section id="produit2">
                <img src="IA3.png" alt="Produit 2">
                <div class="description_produit">
                    <p>Une technologie avancée pour révolutionner votre quotidien...</p>
                    <button class="btn-hover">Découvrir</button>
                </div>
            </section>
        </div>
        <div id="div3">
            <h2>NOUS</h2>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit...</p>
            <div class="team">
                <img src="team1.jpg" alt="Membre 1">
                <img src="team2.jpg" alt="Membre 2">
            </div>
        </div>
        <div id="contact">
            <h2>Contact</h2>
            <form>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" required>
                <label for="message">Message :</label>
                <textarea id="message" name="message" required></textarea>
                <button type="submit" class="btn-hover">Envoyer</button>
            </form>
        </div>
    </main>
    <footer>
        <p>© 2025 Mégatel. Tous droits réservés.</p>
    </footer>
</body>
</html>
