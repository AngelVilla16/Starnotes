<?php

class Conexion{
    //Variables de la conexion como atributos de la clase
    private $servidor = "localhost";
    private $bd = "starnotes";
    private $user = "root";
    private $pass = "";
    private $char = "utf8mb4";

    //atributo pdo de php para poder restringir CRUD
    protected $pdo;

    //funcion para establecer conexiones

    public function __construct(){
        try{
            $dsn = "mysql:host={$this->servidor}; dbname={$this->bd}; charset={$this->char}";
            $this->pdo = new PDO($dsn, $this->user, $this->pass);
            $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
        }
        catch(PDOException $ex)
        {
            die("Error al conectar " . $ex);
        }
    }

    public function getConexion(){
        return $this->pdo;
    }

}
?>