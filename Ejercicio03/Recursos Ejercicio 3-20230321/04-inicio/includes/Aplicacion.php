<?php

class Aplicacion 
{
    private static $instance;

    public static function getInstance(){
        if (!self::$instance instanceof self) {
            self::$instance = new static();
        }
        return self::$instance;
    }

    private function __construct(){}

    private function __clone(){}

    private function __wakeup(){}
    // almacena datos de config de la bd
    private $bdDatosConexion;
    //connect of DB
    private $conn;
    public function getConexionBd()
    {
        if(!$this->conn){
            $bdHost = $this->bdDatosConexion['host'];
            $bdUser = $this->bdDatosConexion['user'];
            $bdPass = $this->bdDatosConexion['pass'];
            $bd = $this->bdDatosConexion['bd'];
            
            $conn = new mysqli($bdHost, $bdUser, $bdPass, $bd);

            // Copiado de ConexionBD de utils dado en el fichero 01-inicio
            if ( $conn->connect_errno ) {
                echo "Error de conexión a la BD ({$conn->connect_errno}):  {$conn->connect_error}";
                exit();
            }
            if ( ! $conn->set_charset("utf8mb4")) {
                echo "Error al configurar la BD ({$conn->errno}):  {$conn->error}";
                exit();
            }

            $this->conn = $conn;
        } 

        return $this->$conn;
    }
}

?>