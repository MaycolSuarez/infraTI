<?php
$id = htmlspecialchars($_GET["id"]);

try {

    $conexion = new PDO("mysql:host=localhost;port=3306;dbname=infrati", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('DELETE FROM productos WHERE id = :id');
    $pdo->bindParam(':id', $id, PDO::PARAM_INT);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}