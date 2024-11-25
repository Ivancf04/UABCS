<?php 
        include_once __DIR__.'/../src/views/layouts/header.php';
?>

    <script>
        document.getElementsByClassName('titulo')[0].addEventListener('click', function() {
            window.location.href = './index.html';
        });
    </script>
    <main class="producto">
        <div id="producto">
                <div class="imagen">
                    <img src="../imgs/Perfume1.png" alt="img">
                </div>
    
                <div class="caracteristica">
                    <h3 class="nombres_productos">Aromatic star anise - MX$599</h3>
                    <h3 class="subtitulo">- Acerca de este perfume -</h3>
                    <h4 class="descripcion_productos">Concentration: 12%
                        Género: Masculine
                        Veganos | Sin parabenos ni ftalatos Veganos | Sin parabenos ni ftalatos | Sin Colorantes ni filtros UV
                        Aromatic Star Anise reescribe una estructura masculina de fragancia que se llama "fougère" (una mezcla de notas cítricas, lavanda, geranio y pachulí). Combinada con materias primas de alta calidad y un toque de fantasía gracias al anís estrella, este perfume deleita a los sentidos de una forma totalmente diferente.
                        
                        Terroso y fresco, Aromatic Star Anise expresa una masculinidad fuerte e inconfundible.</h4>
                </div>
   
            </div>
    </main>

    <article class="contenedor_opcprod">
        <div class="box">
            <h3>Notas e ingredientes</h3>
            <h4>Notas de cabeza: <br> <span class="notas">Bergamota, Pimienta, Anis estrella</span></h4>
            <h4>Notas de corazon: <br> <span class="notas">Lavanda, Nuez moscada, Geranio</span></h4>
            <h4>Notas de fondo: <br> <span class="notas">Pachuli, Madera de ambar, Vetiver</span></h4>

            <h4>Ingredientes: <span class="ingredientes">Pimienta rosa, Esencia de bergamota, Esencia de limón, Esencia de elemí, Esencia de geranio, Esencia de lavanda, Esencia de pachulí, Esencia de pimienta de Sichuan, Esencia de vetiver, Iso E Super, Hedione, Cetalox, Linalol, Dihidromircenol, Ambercore, Verdox, Pamplemousse de metilo, Magnolan, Coranol, Heliotropina, Ambrocenide, Cashmeran, Citronellol, Salicilato de cis-3-hexenilo, Coumarin, Peonile, Aldehído de mandarina, Precyclemone B.</span></h4>
            
            <div id="contenedor_boton">
                <button id="boton">Agregar al carrito</button>
            </div>
        </div>
        
        
        
    </article>  

<?php 
    include_once __DIR__.'/../src/views/layouts/footer.php';
?>