<?php 
        include_once __DIR__.'/../src/views/layouts/head.php';
?> 

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error 404</title>
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/404.css">
</head>
<body>
    <div id="cont">
        
    </div>
    <div id="cont2">
        <a href="./login.php" style="color:inherit; text-decoration:none;">
            <div id="contDir">
                <h1 class="texto" id="titulo">Error 404:(</h1>
                <h2 class="texto" id="cuerpo">Fue imposible encontrar o acceder a la url</h2>
                <h3 class="texto" id="conte">Intenta más tarde</h3>
                <h2 class="texto" id="dir">Volver al login</h2>
            </div>
            <div id=contI>
                <img id="img" src="<?=ASSETS_URL?>/imgs/abusado.png" alt="img">
            </div>
        </a>
    </div>
</body>
</html>