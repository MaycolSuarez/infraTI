<?php

$producto = isset($_POST['txt_producto']) ? $_POST['txt_producto'] : '';
$precio = isset($_POST['int_precio']) ? $_POST['int_precio'] : '';
$tipo = isset($_POST['txt_tipo'])? $_POST['txt_tipo'] : '';

try {

    $conexion = new PDO("mysql:host=50.18.232.33;port=3306;dbname=infrati", "may1", "Ma.12345");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO productos(producto, precio, tipo) VALUES(?, ?, ?)');
    $pdo->bindParam(1, $producto);
    $pdo->bindParam(2, $precio);
    $pdo->bindParam(3, $tipo);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}



