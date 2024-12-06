<?php 
        include_once __DIR__.'/.././layouts/head.php';
?>   
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/carrito.css"
</head>
<body>
<?php
    $id = isset($_GET['idProducto']) && is_numeric($_GET['idProducto']) ? (int)$_GET['idProducto'] : null;
    $user = isset($_GET['userId']) && is_numeric($_GET['userId']) ? (int)$_GET['userId'] : null;
    $idCarrito = isset($_GET['carrito']) && is_numeric($_GET['carrito']) ? (int)$_GET['carrito'] : null;
    include_once __DIR__.'/.././layouts/header.php';

    if (!$idCarrito || !$user) {
        echo "Parámetros inválidos.";
        exit;
    }
    $products = getProductsCar($idCarrito);
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
<main id="contenedor_principal">
    <div id="home">
            <button onclick="window.location.href='./menu.php?page=1&userId=<?= $user?>&carrito=<?=$idCarrito?>'"><img src="<?=ASSETS_URL?>/imgs/home.png" alt="img"></button>
        </div>
    <div id="contenedor_productos">
        <h3 id="titulo">Productos</h3>
        <form class="formu" method="POST" action="<?=SRC_URL?>/controllers/controlPagCarrito.php">
            <?php if (!empty($products)): ?>
                <div id="contProductos">
                <input type="hidden" name="idProducto" value="<?=$id?>"></input>
                <input type="hidden" name="idUsuario" value="<?=$user?>"></input>
                <input type="hidden" name="idCarrito" value="<?=$idCarrito?>"></input>
                <?php foreach($products as $product):?>
                    <a style="color:inherit; text-decoration:none" href="detalles.php?idProducto=<?=$product['id']?>&userId=<?= $user?>&carrito=<?=$idCarrito?>">
                        <div id="<?=$product['id']?>" class="productos">
                            <div class="imagen">
                                <img src="<?=ASSETS_URL?>/<?=$product['url']?>" alt="img">
                            </div>
                            
                            <div class="caracteristica">
                                <h3 class="nombres_productos"><?=$product['name']?></h3>
                                <h3 class="precio_productos">$<?=$product['price']?></h3>
                                <h3> </h3>
                            </div>
                            
                        </div>
                    </a>
                    
                <?php endforeach; ?>
                </div>
                    <div id="contPagar">
                        <button id="pagar" type="submit">Pagar carrito</button>
                    </div>
            <?php else: ?>
                <a style="color:inherit; text-decoration:none" href="detalles.php?idProducto=<?=$id?>&userId=<?= $user?>&carrito=<?=$idCarrito?>">
                    <div id="carVacio">
                        <p>No hay productos en el carrito.</p>
                    </div>
                </a>
            <?php endif; ?>

        </form>
</main>
</body>

<?php
include_once  __DIR__ .'/../layouts/footer.php';
?>