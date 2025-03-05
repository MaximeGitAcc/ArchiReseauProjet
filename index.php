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

    if (!title.dataset.animated) { 
        function typeWriter() {
            if (index < text.length) {
                title.innerHTML += text.charAt(index);
                index++;
                setTimeout(typeWriter, 300);
            }
        }
        title.innerHTML = "";
        title.dataset.animated = "true"; 
        typeWriter();
    }
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

    <?php
        include("header.php")
    ?>

    <?php
        include("main.php")
    ?>

    <?php
        include("footer.php")
    ?>
    
</body>
</html>
