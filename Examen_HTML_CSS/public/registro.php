<?php 
        include_once __DIR__.'/../src/views/layouts/head.php';
?>   
    <link rel="stylesheet" href="<?=ASSETS_URL?>/css/registro.css"
</head>
<body>
    <div id = "fondo" class="container"></div>
    <div class = "container" id = "form-cont">
        <h2 id="iniciar-sesion">Registrarse</h2>
        <p id="error-mensaje"></p>
        <form id="formu" method="POST" action="<?=SRC_URL?>/controllers/registroControl.php">
            <input type="text" name="username" placeholder="Usuario" required>
            <input type="address" name="email" placeholder="Correo" required>
            <input type="password" name="password" placeholder="Contraseña" required>
            <input type="password" name="password2" placeholder="Repite tu contraseña" required>
            <button type="submit">Registrarse</button>
            <p>¿Ya tienes cuenta?<a href="./login.php">Haz click</a></p>
        </form>
        <?php 
                if (isset($_SESSION['errors'][0])) { 
                    echo "<script>
                    document.getElementById('error-mensaje').textContent = '" . $_SESSION['errors'][0] . "';
                    document.getElementById('error-mensaje').style.color = 'black';
                    </script>";
                    unset($_SESSION['errors']);
                }
            ?>
    </div>
</body> 
</html>