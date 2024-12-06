<?php 
        include_once __DIR__.'/.././layouts/head.php';
?>   
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/admin.css"
</head>
<body>
<?php
        $totalProducts = getTotalProducts();
        $totalPages = ceil($totalProducts / 10);
        $currentPage = $_GET['page'] ?: 1;
        $products = getProductsDesc($currentPage, 10);
?>

    
<header>
    <h1 id="titulo">Panel de administrador</h1>
</header>
<main>
    <div id="home">
            <button onclick="window.location.href='../../../public/login.php'"><img src="<?=ASSETS_URL?>/imgs/home.png" alt="img"></button>
        </div>
    <div class="formu">
        <div id="contenedorDetalles">    
                <?php foreach($products as $product):?>
                    
                    <form id="<?=$product['id']?>" action="<?=SRC_URL?>/controllers/controlAdmin.php" method="POST">
                    <div class="contenedorDetalles">
                    <div class="nombre">
                    <input class="nombres_productos" name="name" value="<?=$product['name']?>"></input>
                    </div>
                        <input type="hidden" name="idProducto" value="<?=$product['id']?>">
                        <div class="producto">
                            <div class="imagen">
                                <img src="<?=ASSETS_URL?>/<?=$product['url']?>" alt="img">
                            </div>
                            <div class="desc">
                                    <h3 class="costo">Costo: $<input type="number" step="any" class="precio" name="price" value="<?=$product['price']?>" required></input></h3>
                                    <h3 class="nombres_producto">Descripción:</h3>
                                <div class="scroll">
                                    <textarea name="description" class="descripcion_productos" required><?=$product['description']?></textarea>
                                </div>
                                <div class="botones">
                                    <button class="aceptar" type="submit">Aceptar</button>
                                </div>
                            
                            </div>  
                    </form>     
                    </div>
                </div>
                <?php endforeach?>
        </div>
                </div>
    <hr>
    <hr>
    <div class="nav">
            <?php if ($currentPage > 1): ?>
                <button id="izquierdo" class="navegar" onclick="window.location.href='?page=<?= $currentPage - 1 ?>&userId=<?= $user?>&carrito=<?=$idCarrito?>'"><</button>
            <?php endif; ?>
            <?php if ($currentPage < $totalPages): ?>
                <button id="derecha" class="navegar" onclick="window.location.href='?page=<?= $currentPage + 1 ?>&userId=<?= $user?>&carrito=<?=$idCarrito?>'">></a></button>
            <?php endif; ?>
        </div>
</main>
</body>
