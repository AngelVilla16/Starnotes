<?php
require_once "../Controlador/conexion.php";
header('Content-Type: application/json; charset=utf-8');

try {
    $conexion = new Conexion();
    $con = $conexion->getConexion();

    $q = isset($_GET['q']) ? trim($_GET['q']) : "";

    if ($q !== "") {
        $sql = "SELECT * FROM notes 
                WHERE titulo LIKE :q OR descripcion LIKE :q";
        $stmt = $con->prepare($sql);
        $stmt->bindValue(":q", "%$q%");
    } else {
        $sql = "SELECT * FROM notes";
        $stmt = $con->prepare($sql);
    }

    $stmt->execute();
    $pendientes = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($pendientes, JSON_UNESCAPED_UNICODE);

} catch (PDOException $ex) {
    http_response_code(500);
    echo json_encode([
        "error" => true,
        "mensaje" => "Error al cargar los pendientes",
        "detalle" => $ex->getMessage()
    ]);
}
