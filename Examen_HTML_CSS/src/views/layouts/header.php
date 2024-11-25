<?php 
    require __DIR__.'/../../helpers/functions.php';
    $products = getProducts();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/index.css">

    <title>Parfum</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Playfair+Display:ital,wght@0,400..900;1,400..900&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

</head>
<header>
        <div id="caja_nombre">
            <!--Nombre del sitio-->
            <h1 class="titulo">Parfum</h1>
        </div>

        <div id="caja_texto">
            <!--Opciones de nav-->
            <div id="base" class="opcion">
                <h2 class="opc">Base</h2>
                <ul class="menu">
                    <li>Madera</li>
                    <li>Mineral</li>
                    <li>Flor</li>
                    <li>Agua</li>
                </ul>
            </div>
            <div id="temporada" class="opcion">
                <h2 class="opc">Temporada</h2>
                <ul class="menu">
                    <li>Primavera</li>
                    <li>Verano</li>
                    <li>Otoño</li>
                </ul>
            </div>
            <div id="paquetes" class="opcion">
                <h2 class="opc">Paquetes</h2>
                <ul class="menu">
                    <li>Dia</li>
                    <li>Noche</li>
                    <li>Ambos</li>
                </ul>
            </div>

            <div id="menu_hamburguesa">
                <button id="menu"><img src="<?=ASSETS_URL?>/imgs/menu.png" alt="img"></button>
            </div>
        </div>


        <div id="caja_opciones">
            <button><img src=  "<?=ASSETS_URL?>/imgs/carrito-de-compras.png" alt="img"></button>
        </div>
    </header>