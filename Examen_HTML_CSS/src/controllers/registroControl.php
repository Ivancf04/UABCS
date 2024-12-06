<?php
require_once __DIR__.'/../helpers/functions.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $_SESSION = [];
    $username = $_POST['username'];
    $correo = $_POST['email'];
    $password = $_POST['password'];
    $password2 = $_POST['password2'];

    $username = htmlspecialchars($username);
    
    if(strlen($username) < 5){
        set_error_message_redirect('El nombre de usuario debe tener al menos 5 caracteres.');
    }
    else if(strlen($password) < 8) {
        set_error_message_redirect('La contraseña debe tener al menos 8 caracteres.');
    }
    else if($password != $password2){
        set_error_message_redirect('Las contraseñas no son iguales.');
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    if (registrar_usuario($username, $password, $correo)) {
        header('Location: '.BASE_URL.'/login.php');
        exit;
    } else {
        set_error_message_redirect('Usuario o correo registrados.');
    }
}
?>