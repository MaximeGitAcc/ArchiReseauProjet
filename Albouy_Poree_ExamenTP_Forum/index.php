<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta name="author" content="ALBOUY Maxime ; PORÉE Gaël">
    <link rel="icon" href="20211021_151048.jpg">
    <title>Forum ESN</title>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            let title = document.getElementById("title");
            let text = "Forum ESN";
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
        });
    </script>
</head>
<body>

<?php

    include("header.php");
    include("main.php");
    include("footer.php");
        
?>