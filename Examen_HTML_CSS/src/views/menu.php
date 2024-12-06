
<?php 
        include_once __DIR__.'/.././layouts/head.php';
?>   
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/menu.css"
</head>
<body>
<?php
        include_once __DIR__.'/.././layouts/header.php';
        $totalProducts = getTotalProducts();
        $totalPages = ceil($totalProducts / 10);
        $currentPage = $_GET['page'];
        $products = getProducts($currentPage, 10);
?>
            <div id="caja_opciones">
                <form action="<?=SRC_URL?>/controllers/logoutControl.php" method="post">
                    <div id="menu_hamburguesa">
                        <button type="submit" id="menu"><img src="<?=ASSETS_URL?>/imgs/cerrar.png" alt="img"></button>
                    </div>
                </form>
                <a href="../pages/carrito.php?idProducto=<?=$currentPage?>&userId=<?=$user?>&carrito=<?=$idCarrito?>"><button><img src=  "<?=ASSETS_URL?>/imgs/carrito-de-compras.png" alt="img"></button></a>
            </div>

            
    </header>
    <div id="contenedor_avisos">
        <article id="aviso">
            <div id="seccion1" class="avisos">
                <img src="<?=ASSETS_URL?>/imgs/perfume.png" alt="img">
                <h3>Perfumes de lujo</h3>
            </div>
            <div id="seccion2" class="avisos">
                <img src="<?=ASSETS_URL?>/imgs/insignia.png" alt="img">
                <h3>Garantías de satisfacción</h3>
            </div>
            <div id="seccion3" class="avisos">
                <img src= "<?=ASSETS_URL?>/imgs/estrella-blanca.png" alt="img">
                <h3>Calificación de 5 estrellas de clientes</h3>
            </div>
            <div id="seccion4" class="avisos">
                <img src="<?=ASSETS_URL?>/imgs/tiempo-restante.png" alt="img">
                <h3>De larga duración</h3>
            </div>
        </article>
    </div>

    <div id="contenedor_fondo">
        <div id="contenedor_texto">
            <h3>Aromas intensos</h3>
        </div>
    </div>

    <article class="contenedor_carrusel">
        <!--Contenedor carrusel-->
        <div id="carrusel" class="carousel slide" data-bs-ride="carousel">
            <!--Indicadores-->
            <ul class="carousel-indicators">
                <li data-bs-target="#carrusel" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carrusel" data-bs-slide-to="1"></li>
                <li data-bs-target="#carrusel" data-bs-slide-to="2"></li>
            </ul>

            <!--Posicion imagenes-->
            <div class="carousel-inner">
              <div class="carousel-item active bg_img1 bg" data-bs-interval="2000">
                <div class="cont_carr_img">
                    <img src="<?=ASSETS_URL?>/imgs/Perfume1.png" class="imagen_carrusel" alt="img">    
                </div>
                
              </div>
              <div class="carousel-item bg_img2 bg" data-bs-interval="2000">
                <div class="cont_carr_img">
                    <img src="<?=ASSETS_URL?>/imgs/Perfume2.png" class="imagen_carrusel" alt="img">    
                </div>
              </div>
              <div class="carousel-item bg_img3 bg" data-bs-interval="5000">
                <div class="cont_carr_img">
                    <img src="<?=ASSETS_URL?>/imgs/Perfume3.png" class="imagen_carrusel" alt="img">    
                </div>
              </div>
            </div>
        </div>
    </article>

    <main id="contenedor_principal">
        <div id="home">
            <button onclick="window.location.href='?page=1&userId=<?=$user?>&carrito=<?=$idCarrito?>'"><img src="<?=ASSETS_URL?>/imgs/home.png" alt="img"></button>
        </div>
        
        <div id="contenedor_productos">
            <?php foreach($products as $product):?>
            <a style="color:inherit; text-decoration:none" href="detalles.php?idProducto=<?=$product['id']?>&userId=<?= $user?>&carrito=<?=$idCarrito?>">
                <div id="<?=$product['id']?>" class="productos">
                    <div class="imagen">
                        <img src="<?=ASSETS_URL?>/<?=$product['url']?>" alt="img">
                    </div>
                    
                    <div class="caracteristica">
                        <h3 class="nombres_productos"><?=$product['name']?> - $<?=$product['price']?></h3>
                        <h3> </h3>
                    </div>
                    
                </div>
            
            </a>
            <?php endforeach; ?>
        </div>

        <div class="nav">
            <?php if ($currentPage > 1): ?>
                <button id="izquierdo" class="navegar" onclick="window.location.href='?page=<?= $currentPage - 1 ?>&userId=<?= $user?>&carrito=<?=$idCarrito?>'"><</button>
            <?php endif; ?>
            <?php if ($currentPage < $totalPages): ?>
                <button id="derecha" class="navegar" onclick="window.location.href='?page=<?= $currentPage + 1 ?>&userId=<?= $user?>&carrito=<?=$idCarrito?>'">></a></button>
            <?php endif; ?>
        </div>
        
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php 
    include_once __DIR__.'/.././layouts/footer.php';
?>
