<?php
require "../Controlador/conexion.php";

header("Content-Type: application/json");

//Traer los datos en formato json del post a eliminar 
//La funcion decode decodifica es decir recupera los datos del formato json y devuelve true 
$datos = json_decode(file_get_contents("php://input"),true);

$id = $datos["id"] ?? 0;

//preparar secuencia sql para eliminar los datos
$db = new Conexion();
$con = $db->getConexion();
$sql = "DELETE FROM notes WHERE Id = :id";
$stmt = $con->prepare($sql);

$stmt->bindParam(":id", $id, PDO::PARAM_INT);

if($stmt->execute()){
    echo json_encode(["success" => true]);

}
else{
    echo json_encode(["success" => false, "message" => "Error al eliminaR"]);
}

?>