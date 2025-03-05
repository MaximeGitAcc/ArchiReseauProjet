<header>
    <video id="background-video" autoplay loop muted>
        <source src="Film de pub Minitel.mp4" type="video/mp4">
    </video>
    <nav>
        <!-- Menu burger -->
        <div id="burger-menu" class="burger-menu" onclick="toggleMenu()">
            <div class="burger-icon"></div>
            <div class="burger-icon"></div>
            <div class="burger-icon"></div>
        </div>
        
        <!-- Menu de navigation -->
        <div id="nav-links" class="nav-links">
            <span><a href="#div1">A PROPOS</a></span>
            <span><a href="#div2">PRODUITS</a></span>
            <span><a href="#div3">NOUS</a></span>
            <span><a href="#contact">CONTACT</a></span>
        </div>
    </nav>
    <h1 id="title"></h1>
    <script>
    document.addEventListener("DOMContentLoaded", function() {
        const burgerMenu = document.getElementById('burger-menu');
        const navLinks = document.getElementById('nav-links');

        burgerMenu.addEventListener("click", function() {
            navLinks.classList.toggle("show");
        });
    });
</script>
</header>
