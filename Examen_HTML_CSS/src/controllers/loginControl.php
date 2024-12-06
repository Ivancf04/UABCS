<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (iniciar_sesion($username, $password)) {
        $id_carrito = get_IdCarrito($_SESSION['user']);
        $_SESSION['carrito'] = $id_carrito;
            header('Location: '.BASE_URL.'/../src/views/pages/menu.php?page=1&userId='.$_SESSION['user'].'&carrito='.$id_carrito);
        exit;
    } else {
        set_error_message_redirect('El usuario y la contraseña no coinciden.');
    }
}
?>