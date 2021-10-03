<?php
require '../modelo/Pais.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class PaisControlador extends Pais{

    public function __construct(){}
    public function verificacioninsertar($nombre,$descripcion){
        //Espacio para validar la informacion en general
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->insertar();
        $this->redireccionar();
    }
    public function verificacioneliminar($id){
       $this->id = $id;
       $this->eliminar();
       $this->redireccionarmostrar();
    }
    public function verificacionmostrar(){
        // echo "Estamos llegando a la funcion Mostrar";
        $objetoretornado = $this->mostrar();
        require '../vistas/paises/mostrar.php';
    }
    public function insertarpaises(){
        // echo "Estamos llegando a la funcion Insertar";
        require '../vistas/paises/formulario.php';
    }
    public function verificacionactualizar($id){
        $this->id = $id;
        $objetoretornado = $this->actualizar();
       
        require '../vistas/paises/actualizar.php';
    }
    public function verificacionactualizarinsertar($id,$nombre,$descripcion){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->actualizarinsertar();
        $this->redireccionarmostrar();
    }
    
    public function redireccionar(){
        header("location: PaisControlador.php?accion=mostrar");
    }
    public function redireccionarmostrar(){
        header("location: PaisControlador.php?accion=mostrar");
}
}



 if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){  
    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new PaisControlador();
        $instanciacontrolador->verificacionmostrar();
    }
 }
   if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){  
        if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
            $instanciacontrolador = new PaisControlador();
            $instanciacontrolador->insertarpaises();
        }
    if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
        if(isset($_POST['nombre'])&&isset($_POST['descripcion'])){
            $instanciacontrolador = new PaisControlador();
            $instanciacontrolador->verificacioninsertar($_POST['nombre'],$_POST['descripcion']);  
        }
    else {
        echo "Falto la Informacion por Llegar";
    }
}
    // else{
    //     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
    // }

    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new PaisControlador();
        $instanciacontrolador->verificacionmostrar();
    }

    if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
        $instanciacontrolador = new PaisControlador();
        $id = $_GET['id'];
        $instanciacontrolador->verificacioneliminar($id);
    }
    if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
        $instanciacontrolador = new PaisControlador();
         $id = $_GET['id'];
         $instanciacontrolador->verificacionactualizar($id);
     }
 
     if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
         if (isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['descripcion'])) {
          $instanciacontrolador = new PaisControlador();
          $instanciacontrolador->verificacionactualizarinsertar($_POST['id'],$_POST['nombre'],$_POST['descripcion']);
         }
         else {
             echo "Error al enviar la informacion";
         }
     }
    }

?>