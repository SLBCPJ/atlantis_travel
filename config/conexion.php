<?php

class Conexion{
    public $datos;
    function __construct(){
        $usuario = 'root';
        $contrasena = '';  

    try{

    $this->datos = new PDO('mysql:host=localhost;dbname=mydb', $usuario ,$contrasena);
    } catch(PDOexception $e){
        echo "Error : " . $e->getMessage();
    }
} 
    public function cerrarconexion(){
        $this->datos = null;
    }
}
?>