<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $texto = $_POST['texto'];
    $idUsuario = $_POST['idUsuario'];
    $idCarrito = $_POST['idCarrito'];

    
    try {
        if(is_numeric(contarProductos($texto))){
            $total = contarProductos($texto);
            header('Location: ' . BASE_URL . '/../src/views/pages/menuBus.php?page=1&userId=' . $idUsuario . '&carrito=' . $idCarrito . '&texto=' . $texto . '&total=' . $total);
        exit;
        }
    } catch (Exception $e) {
        echo 'Error al redirigir: ' . $e->getMessage();
    }

}
?>