<!DOCTYPE html>
<html lang="fr">
<body>
    <meta charset="utf-8">
    <meta name="author" content="ALBOUY Maxime ; PORÉE Gaël">
    <link rel="stylesheet" href="CSS.css">
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
    </script>
<body>

<?php

    include("header.php");
    include("main.php");
    include("footer.php");
        
?>