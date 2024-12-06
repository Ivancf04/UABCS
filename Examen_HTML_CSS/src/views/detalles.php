<?php 
        include_once __DIR__.'/.././layouts/head.php';
?>   
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/detalles.css"
</head>
<body>
<?php
        $id = $_GET['idProducto'];
        $user = $_GET['userId'];
        $idCarrito = $_GET['carrito'];
        $product = getProducto($id);
        $comentarios = getComentarios($id);
        include_once __DIR__.'/.././layouts/header.php';
?>
            <div id="caja_opciones">
                <form action="<?=SRC_URL?>/controllers/logoutControl.php" method="post">
                    <div id="menu_hamburguesa">
                        <button type="submit" id="menu"><img src="<?=ASSETS_URL?>/imgs/cerrar.png" alt="img"></button>
                    </div>
                </form>
                <a href="../pages/carrito.php?idProducto=<?=$id?>&userId=<?=$user?>&carrito=<?=$idCarrito?>"><button><img src=  "<?=ASSETS_URL?>/imgs/carrito-de-compras.png" alt="img"></button></a>
            </div>
    </header>
<!-- Parte de los detalles del producto -->

<main>
    <div id="home">
            <button onclick="window.location.href='./menu.php?page=1&userId=<?= $user?>&carrito=<?=$idCarrito?>'"><img src="<?=ASSETS_URL?>/imgs/home.png" alt="img"></button>
        </div>
    <form class="formu" method="POST" action="<?=SRC_URL?>/controllers/controlAgregarCarrito.php">
        <div id="contenedorDetalles">
            <input type="hidden" name="idProducto" value="<?=$id?>"></input>
            <input type="hidden" name="idUsuario" value="<?=$user?>"></input>
            <input type="hidden" name="idCarrito" value="<?=$idCarrito?>"></input>
            <div id="nombre">
                <h3 class="nombres_productos"><?=$product['name']?></h3>
            </div>
            <div id="producto">
                <div id="imagen">
                    <img src="<?=ASSETS_URL?>/<?=$product['url']?>" alt="img">
                </div>
                <div id="desc">
                    <h3 id="costo">Costo: <br><span id="precio">$<?=$product['price']?></span></h3>
                    <h3 class="nombres_producto">Descripción:</h3>
                    <div id="scroll">
                        <h3 class="descripcion_productos"><?=$product['description']?></h3>
                    </div>
                    
                </div>       
                
            </div>
            
        </div>
        <div id="contAg">
            <button type="submit" class="agregar">Agregar al carrito</button>
        </div>
    </form>
    <hr>
</main>

<!-- Parte de los comentarios -->

<article>
<form class="formu" id="formCom" method="POST" action="<?=SRC_URL?>/controllers/controlComentarios.php">
    <h3 id="titulo">Comentarios</h3>
    <div id="inCom">
        <h3 id="textCom">Ingresar un comentario:</h3>
        <input style="display:none;" name="idProducto" value="<?=$id?>"></input>
        <input style="display:none;" name="idUsuario" value="<?=$user?>"></input>
        <input type="hidden" name="idCarrito" value="<?=$idCarrito?>"></input>
        <textarea id="inpCom" type="text" name="contenido" placeholder="Maximo 100 caracteres" maxlength = "100" required></textarea>
        <div id="buCom">
            <button type="submit" class="agregar">Agregar comentario</button>
        </div>
        
    </div>
    <hr>
    <h3 id="tit">Comentarios de otras personas:</h3>
    <div id="comentarios">
        <?php foreach($comentarios as $comentario):?>
                <div id="<?=$comentario['id']?>" class="comentarios">
                    <div class="comentario">
                        <?php 
                            $usuario = getUser($comentario['id_usuario']);
                        ?>
                        <h3 class="usuarios"><?=$usuario['user']?>:</h3>
                        <h3 class="contenido"><?=$comentario['contenido']?></h3>
                        <h3 id="fecha" class="contenido"><?=$comentario['fecha']?></h3>
                    </div>
                    
                </div>
        <?php endforeach; ?>
    </div>
</form>
</article>
</body>

<?php
include_once  __DIR__ .'/../layouts/footer.php';
?>