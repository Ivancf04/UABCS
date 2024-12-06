<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $idProducto = $_POST['idProducto'];
    $idUsuario = $_POST['idUsuario'];
    $idCarrito = $_POST['idCarrito'];

    if (agregar_producto($idCarrito, $idProducto)) {
        header('Location:'.BASE_URL.'/../src/views/pages/detalles.php?idProducto='.$idProducto.'&userId='.$idUsuario.'&carrito='.$idCarrito);
        exit;
    } else {
        set_error_message_redirect('Error al agregar producto');
    }
}
?>