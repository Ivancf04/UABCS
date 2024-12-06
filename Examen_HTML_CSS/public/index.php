<?php

define('URL', 'Examen_HTML_CSS/public');

$request = $_SERVER['REQUEST_URI'];

$request = strtok($request, '?');

switch($request){
    case URL.'/':
        require_once __DIR__.'/login.php';
        break;
    case URL.'/menu':
        require_once __DIR__.'/../src/views/pages/menu.php?page=1&userId='.$_SESSION['user'].'&carrito='.$_SESSION['carrito'];
        break;
    case URL.'/menuBus':
        require_once __DIR__.'/../src/views/pages/menuBus.php?page=1&userId='.$_SESSION['user'].'&carrito='.$_SESSION['carrito'];
        break;
    case URL.'/admin':
        require_once __DIR__.'/../src/views/pages/admin.php?page=1';
        break;
    case URL.'/login':
        require_once __DIR__.'/login.php';
        break;
    case URL.'/registro':
        require_once __DIR__.'/registro.php';
        break;
    case URL.'/logout':
        require_once __DIR__.'/../src/controllers/logoutController.php';
        break;
    default:
        http_response_code(404);
        require_once __DIR__.'/404.php';
        break;

}