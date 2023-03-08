<?php
    $id = isset($_POST['id_producto'])? $_POST['id_producto'] : '';
    $producto = isset($_POST['txt_producto']) ? $_POST['txt_producto'] : '';
    $precio = isset($_POST['int_precio']) ? $_POST['int_precio'] : '';
    $tipo = isset($_POST['txt_tipo'])? $_POST['txt_tipo'] : '';

    try {

        $conexion = new PDO("mysql:host=localhost;port=3306;dbname=infrati", "root", "");
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    
        $pdo = $conexion->prepare('UPDATE productos set producto=?, precio=?, tipo=? WHERE id=?');
        $pdo->execute([$producto, $precio, $tipo, $id]) or die(print($pdo->errorInfo()));
    
        echo json_encode('true');
    
    } catch(PDOException $error) {
        echo $error->getMessage();
        die();
    }

    
    