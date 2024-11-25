<?php 
require __DIR__.'/../config/database.php';
$config = require __DIR__.'/../config/config.php';
define('BASE_URL', $config['base_url']);
define('ASSETS_URL', $config['assets_url']);

function getProducts() 
{
    $pdo = getPDO();

    try{
        $sql = "SELECT name,price,url,descripcion FROM products";
        $stmt = $pdo->query($sql);
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
    }catch (PDOException $e){
        error_log("Error al consultar la base de datos". $e->getMessage());
        return [];
    }
}
