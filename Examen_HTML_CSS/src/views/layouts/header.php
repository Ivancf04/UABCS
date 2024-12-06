<?php
     $user = $_GET['userId'];
     $idCarrito = $_GET['carrito'];
?>
<header>
        <div id="caja_nombre">
            <!--Nombre del sitio-->
            <a style="text-decoration:none; color:inherit;" href="./menu.php?page=1&userId=<?=$user?>&carrito=<?=$idCarrito?>"><h1 class="titulo">Parfum</h1></a>
        </div>

        <div id="caja_texto">
            <!--Opciones de nav-->
            <form id="base" class="opcion" method="POST" action="<?=SRC_URL?>/controllers/controlBus.php">
                <input type="hidden" name="idUsuario" value="<?=$user?>"></input>
                <input type="hidden" name="idCarrito" value="<?=$idCarrito?>"></input>
                <input id="inBus" type="text" name="texto" placeholder="Ingresa el nombre del producto">
                <button id="buBus" type="submit"><img src="<?=ASSETS_URL?>/imgs/lupa.png" alt="img"></button> 
            </form>
        </div>

