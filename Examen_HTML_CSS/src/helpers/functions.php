<?php 
require __DIR__.'/../config/database.php';
$config = require __DIR__.'/../config/config.php';
define('BASE_URL', $config['base_url']);
define('ASSETS_URL', $config['assets_url']);
define('SRC_URL', $config['src_url']);

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

function buscarProducts($texto, $page, $limit=10){
    if (!is_numeric($page) || $page <= 0) {
        return [];
        }
        $pdo = getPDO();
        $offset = ($page - 1) * $limit;
        try {
            $stmt = $pdo->prepare("CALL buscar_productos (:texto, :offset, :limit)");
            $stmt->bindValue(':texto', $texto, PDO::PARAM_STR);
            $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();
            $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $products;
        } 
        catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return [];
        }
}

function getProducts($page, $limit = 10) 
{
    if (!is_numeric($page) || $page <= 0) {
    return [];
    }
    $pdo = getPDO();
    $offset = ($page - 1) * $limit;
    try {
        $stmt = $pdo->prepare("SELECT id, name, price, url FROM productos LIMIT :offset, :limit");
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } 
    catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getProductsDesc($page, $limit = 10) 
{
    if (!is_numeric($page) || $page <= 0) {
    return [];
    }
    $pdo = getPDO();
    $offset = ($page - 1) * $limit;
    try {
        $stmt = $pdo->prepare("SELECT id, name, price, description, url FROM productos LIMIT :offset, :limit");
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $products;
    } 
    catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getTotalProducts() {
    $pdo = getPDO();
    $stmt = $pdo->prepare("SELECT COUNT(*) AS total FROM productos");
    $stmt->execute();
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result['total'];
}

function contarProductos($texto) {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("CALL contar_productos_por_texto(:texto)");
        $stmt->bindValue(':texto', $texto, PDO::PARAM_STR);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        return $resultado['total_coincidencias'];
    } catch (PDOException $e) {
        error_log("Error al contar productos: " . $e->getMessage());
        return 0;
    }
}

function getProducto($id) {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
        $stmt->bindValue(':id', intval($id), PDO::PARAM_INT);
        $stmt->execute();
        $producto = $stmt->fetch(PDO::FETCH_ASSOC);

        return $producto;
    } catch (PDOException $e) {
        echo "Error al obtener el producto: " . $e->getMessage();
        return null;
    }
}

function regisComentario($contenido, $idProducto, $idUsuario){
    if (!is_numeric($idProducto) || $idProducto < 0 || !is_numeric($idUsuario) || $idUsuario < 0) {
        return false;
        }
        $pdo = getPDO();
        try {
            $stmt = $pdo->prepare("CALL agregar_comentario(:contenido, :id_usuario, :id_producto)");
            $stmt->bindValue(':contenido', $contenido);
            $stmt->bindValue(':id_producto', $idProducto, PDO::PARAM_INT);
            $stmt->bindValue(':id_usuario', $idUsuario, PDO::PARAM_INT);
            $stmt->execute();
            return true;
        } 
        catch (PDOException $e) {
            error_log("Error al consultar la base de datos: " . $e->getMessage());
            return false;
        }
}

function getComentarios($idProducto) 
{
    if (!is_numeric($idProducto) || $idProducto < 0) {
    return [];
    }
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT id,contenido, id_usuario, fecha FROM comentarios WHERE id_producto = :id_producto ORDER BY fecha DESC");
        $stmt->bindValue(':id_producto', $idProducto, PDO::PARAM_INT);
        $stmt->execute();
        $comentarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $comentarios;
    } 
    catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function getUser($idUsuario) 
{
    if (!is_numeric($idUsuario) || $idUsuario < 0) {
    return [];
    }
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("SELECT user FROM usuarios WHERE id = :id");
        $stmt->bindValue(':id', $idUsuario, PDO::PARAM_INT);
        $stmt->execute();
        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        return $usuario;
    } 
    catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function registrar_usuario($username, $password, $correo){
    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("INSERT INTO usuarios (user, address, password)
        VALUES (:user, :address, :password)");
        $stmt->bindParam(':user', $username);
        $stmt->bindParam(':address', $correo);
        $stmt->bindParam(':password', $password);
        $stmt->execute();
        
        $stmt = $pdo->prepare("SELECT id FROM usuarios
        WHERE user = :user");
        $stmt->bindParam(':user', $username);
        $stmt->execute();
        $id = $stmt->fetch(PDO::FETCH_ASSOC);
        $id = $id['id'];
        
        if(crear_carrito($id)){
            return true;
        }
        else{
            return false;
        }
        
        
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function crear_carrito($id){
    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("CALL crear_carrito_para_usuario(:id_usuario)");
        $stmt->bindParam(':id_usuario', $id);
        $stmt->execute();
        return true;
        
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function get_IdCarrito($id){
    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT id FROM carrito WHERE id_usuario = :id_usuario");
        $stmt->bindParam(':id_usuario', $id, PDO::PARAM_INT);
        $stmt->execute();
        $idCarrito = $stmt->fetch(PDO::FETCH_ASSOC);
        $idCarrito = $idCarrito['id'];
        if($idCarrito != null){
            return $idCarrito;
        }
        else{
            if(crear_carrito($id)){
                $idCarrito = get_IdCarrito($id);
            }
            return $idCarrito;

        }
        
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return null;
    }
}

function agregar_producto($idCarrito, $idProducto){
    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("CALL agregar_producto_al_carrito(:id_carrito, :id_producto)");
        $stmt->bindParam(':id_producto', $idProducto, PDO::PARAM_INT);
        $stmt->bindParam(':id_carrito', $idCarrito, PDO::PARAM_INT);
        $stmt->execute();
        
        return true;
        
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function getProductsCar($idCarrito) {
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("CALL getProductosCar (:id_carrito)");
        $stmt->bindValue(':id_carrito', $idCarrito, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $products;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return [];
    }
}

function pagarCarrito($idCarrito){
    $pdo = getPDO();
    try {
        $stmt = $pdo->prepare("CALL registrar_venta (:id_carrito)");
        $stmt->bindValue(':id_carrito', $idCarrito, PDO::PARAM_INT);
        $stmt->execute();

        return true;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function iniciar_sesion($user, $password) {
    try {
        $pdo = getPDO();
        $stmt = $pdo->prepare("SELECT id ,password FROM usuarios WHERE user = :user");
        $stmt->bindParam(':user', $user);
        $stmt->execute();

        $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($usuario && password_verify($password, $usuario['password'])) {
            $_SESSION['user'] = $usuario['id'];
            return true;
        } else {
            return false;
        }
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function clean_post_inputs()
{
    foreach ($_POST as $key => $value) {
        $_POST[$key] = trim($_POST[$key]);
        $_POST[$key] = filter_input(INPUT_POST, $key, FILTER_SANITIZE_STRING);
    }
}

function editarProducto($id, $name, $price, $description){
    try {
        $pdo = getPDO();
        
        $stmt = $pdo->prepare("UPDATE productos SET name = :name, price = :price, description = :description WHERE id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->bindParam(':name', $name, PDO::PARAM_STR);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description, PDO::PARAM_STR);
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        error_log("Error al consultar la base de datos: " . $e->getMessage());
        return false;
    }
}

function set_success_message($message) 
{
    $_SESSION['success'] = $message;
}

function set_error_message($message)
{
    $_SESSION['errors'][] = $message;
}

function set_error_message_redirect($message)
{
    $_SESSION['errors'][] = $message;
    redirect_back();
}

function redirect_back(){
    header("Location: " . $_SERVER['HTTP_REFERER']);
    exit;
}
?>