<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require '../modelo/Paquete.php';
require '../modelo/Servicio.php';
require '../modelo/PaqueteXServicio.php';
require '../config/conexion.php';

class PaqueteControlador extends Paquete{

    public function __construct(){}
    public function verificacioninsertar($nombre,$descripcion,$duracion,$fecha,$tour,$obsequio,$precio,$namefoto,$temp,$urlfoto,$Servicios_id){
        //Espacio para validar la informacion en general
        $instanciamodeloserv = new PaqueteXServicio();
        $instanciamodeloserv->Servicios_id = $Servicios_id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;;
          $this->duracion = $duracion;
        $this->fecha =  $fecha;
        $this->obsequio = $obsequio;
        $this->tour =  $tour;
        $this->precio = $precio;
        $this->foto =  $namefoto;
        $this->foto_url =  $urlfoto;
        $this->temporal = $temp;
        
        $this->insertar();
        move_uploaded_file($this->temporal,$this->foto_url);
        $objetoretornadoconsulta = $this->consultarultimoservicio(); 
        $instanciamodeloserv->Paquetes_id = $objetoretornadoconsulta[0];
        $instanciamodeloserv->insetartablaintermedia();
        $this->redireccionar();
    }
    public function verificacioneliminar($id,$foto_url){
        $this->id = $id;
        $this->eliminar();
        unlink($foto_url);
        $this->redireccionarmostrar();
     }
    
    public function verificacionmostrar(){
        // echo "Estamos llegando a la funcion Mostrar";
        $objetoretornado = $this->mostrar();
        require '../vistas/paquetes/mostrar.php';
    }
    public function mostrarpaquete(){
        // echo "Estamos llegando a la funcion Mostrar";
        $mostrarpaquete = $this->mostrar();
        require '../inicio/paquetes.php';
    }

    public function verificacionmostrarpaquetes(){
        $servicio = new Servicio();
        $objetoretornadoservicio = $this->mostrarservicios();
        require '../vistas/paquetes/formulario.php';
    }
    public function verificacionactualizar($id){
        $this->id = $id;
       
        $objetoretornado = $this->actualizar();
       
        require '../vistas/paquetes/actualizar.php';
    }
      public function detallepaquete($id){
        $this->id = $id;
        $detallepaquete = $this->detahosp();
        require '../inicio/detallepaquete.php';
    }
        public function hosp($id){
        $this->id = $id;
        $perfil = $this->detahosp();
        require '../vistas/paquetes/vermas.php';
    }
    public function verificacionactualizarinsertar($id,$nombre,$descripcion,$duracion,$fecha,$tour,$obsequio,$precio,$namefoto,$temp,$urlfoto){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->duracion = $duracion;
        $this->fecha =  $fecha;
        $this->obsequio = $obsequio;
        $this->tour =  $tour;
        $this->precio =  $precio;
        $this->foto =  $namefoto;
        $this->foto_url =  $urlfoto;
        $this->temporal = $temp;
        // var_dump($id,$nombre,$descripcion,$tour,$obsequio,$precio,$namefoto,$temp,$urlfoto);
       
        $this->actualizarinsertar();
        
        // move_uploaded_file($this->temporal,$this->foto_url);
        copy($this->temporal,$this->foto_url);
        // unlink($foto_url);
        $this->redireccionarmostrar();
    }
    public function redireccionar(){
        header("location:  PaqueteControlador.php?accion=mostrar");
    }
    public function redireccionarmostrar(){
        header("location:  PaqueteControlador.php?accion=mostrar");
    }

}

     if (empty($_SESSION['email'])){
        if (isset($_GET['accion']) && $_GET['accion']=="inicio") {
        $instanciacontrolador = new PaqueteControlador();
        $instanciacontrolador->mostrarpaquete();
         
    }

    }
    
        if (isset($_GET['accion']) && $_GET['accion']=='ver') {
            $instanciacontrolador = new PaqueteControlador();
            $id = $_GET['id'];
            $instanciacontrolador->detallepaquete($id);
        }

    


   if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){  
if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
    $instanciacontrolador = new PaqueteControlador();
    $instanciacontrolador->verificacionmostrarpaquetes();
}

    if (isset($_POST['accion']) && $_POST['accion']=="insertar") {
        if(isset($_POST['nombre'])&&isset($_FILES['foto'])&&isset($_POST['descripcion'])&&isset($_POST['duracion'])&&isset($_POST['fecha'])&&isset($_POST['tour'])&&isset($_POST['obsequio'])&&isset($_POST['precio'])){
            
            $namefoto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $urlfoto = "../img/imgPaquete/" . $namefoto;

            $instanciacontrolador = new PaqueteControlador();
            $instanciacontrolador->verificacioninsertar($_POST['nombre'],$_POST['descripcion'],$_POST['duracion'],$_POST['fecha'],$_POST['tour'],$_POST['obsequio'],$_POST['precio'],$namefoto,$temp,$urlfoto,$_POST['Servicios_id']);
    }
        
    else {
        echo "Falto la Informacion por Llegar";
    }
}


    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new PaqueteControlador();
        $instanciacontrolador->verificacionmostrar();
    }
    // if (isset($_GET['accion']) && $_GET['accion']=="inicio") {
    //     $instanciacontrolador = new PaqueteControlador();
    //     $instanciacontrolador->mostrarpaquete();
    // }

    if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
        $instanciacontrolador = new PaqueteControlador();
        $id = $_GET['id'];
        $foto_url = $_GET['foto_url_paqu'];
        $instanciacontrolador->verificacioneliminar($id,$foto_url);
    }
    if (isset($_GET['accion']) && $_GET['accion']=='detahosp') {
        $instanciacontrolador = new PaqueteControlador();
        $id = $_GET['id'];
        $instanciacontrolador->hosp($id);
    }
    if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
        $instanciacontrolador = new PaqueteControlador();
         $id = $_GET['id'];
         $instanciacontrolador->verificacionactualizar($id);
     }
 
     if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
         if (isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_FILES['foto'])&&isset($_POST['descripcion'])&&isset($_POST['duracion'])&&isset($_POST['fecha'])&&isset($_POST['tour'])&&isset($_POST['obsequio'])&&isset($_POST['precio'])){
            $namefoto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $urlfoto = "../img/imgPaquete/" . $namefoto;
            
          $instanciacontrolador = new PaqueteControlador();
          $instanciacontrolador->verificacionactualizarinsertar($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['duracion'],$_POST['fecha'],$_POST['tour'],$_POST['obsequio'],$_POST['precio'],$namefoto,$temp,$urlfoto);
         }
         else {
             echo "Error al enviar la informacion";
         }
     }
    }
    
         if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){ 
                if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
                $instanciacontrolador = new PaqueteControlador();
                $instanciacontrolador->verificacionmostrar();
            }
        if (isset($_GET['accion']) && $_GET['accion']=='detahosp') {
                $instanciacontrolador = new PaqueteControlador();
                $id = $_GET['id'];
                $instanciacontrolador->hosp($id);
         }
      }

?>