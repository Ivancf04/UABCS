<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $id = $_POST['idProducto'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (editarProducto($id, $name, $price, $description)) {
        header('Location:'.SRC_URL.'/views/pages/admin.php?page=1');
        exit;
    } else {
        set_error_message_redirect('Error al agregar producto');
    }
}
?>