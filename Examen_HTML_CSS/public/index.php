<?php 
        include_once __DIR__.'/../src/views/layouts/header.php';
?>

<body>
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
        <div id="contenedor_productos">
            <?php foreach($products as $product):?>
            <div class="productos">
                <div class="imagen">
                    <img src="<?=ASSETS_URL?>/<?=$product['url']?>" alt="img">
                </div>
                
                <div class="caracteristica">
                    <h3 class="nombres_productos"><?=$product['name']?> - <?=$product['price']?></h3>
                    <h4 class="descripcion_productos"><?=$product['descripcion']?></h4>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="nav">
            <p id="paginas"><span id="izquierdo" class="navegar"><</span>  <span id="derecha" class="navegar">></span></p>
        </div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

<?php 
    include_once __DIR__.'/../src/views/layouts/footer.php';
?>
