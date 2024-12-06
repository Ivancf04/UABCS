<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $contenido = $_POST['contenido'];
    $idProducto = $_POST['idProducto'];
    $idUsuario = $_POST['idUsuario'];
    $idCarrito = $_POST['idCarrito'];
    

    $contenido = htmlspecialchars($contenido);
    
    if(strlen($contenido) > 100 && strlen($contenido) < 1){
        set_error_message_redirect('Numero de caracteres invalido');
    }

    if (regisComentario($contenido, $idProducto, $idUsuario)) {
        header('Location:'.BASE_URL.'/../src/views/pages/detalles.php?idProducto='.$idProducto.'&userId='.$idUsuario.'&carrito='.$idCarrito);
        exit;
    } else {
        set_error_message_redirect('Usuario o correo registrados.');
    }
}
?>