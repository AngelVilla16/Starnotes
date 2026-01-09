<?php
require_once "../Controlador/conexion.php";

$dbconexion = new Conexion();
$pdo = $dbconexion->getConexion();

if(isset($_POST['titulo'] ) && isset($_POST['descripcion'])){

    $titulo = $_POST['titulo'];
    $desc = $_POST['descripcion'];
    $fecha = date("Y-m-d");

    $sql = "INSERT INTO notes (Titulo, Descripcion,Fecha) VALUES (?, ?,?)";

    $stmt= $pdo->prepare($sql);

    try {
        $sql = "INSERT INTO notes (Titulo, Descripcion,Fecha) VALUES (?, ?,?)";
        $stmt = $pdo->prepare($sql);

        if($stmt->execute([$titulo, $desc,$fecha])){
            echo "<script>
                alert('Pendiente guardado en las estrellas');
                window.location.href = '../Vista/HTML/index.html'; 
            </script>";
        }
    } catch (PDOException $e) {
        echo "Error en la base de datos: " . $e->getMessage();
    }
}

?>