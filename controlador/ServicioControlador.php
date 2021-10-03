<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require '../modelo/Servicio.php';
require '../modelo/Hospedaje.php';
require '../modelo/HospedajeXServicio.php';
require '../config/conexion.php';

class ServicioControlador extends Servicio{

    public function __construct(){}
    public function verificacioninsertar($nombre,$descripcion,$servicio_adi,$costo,$Hospedajes_id){
        //Espacio para validar la informacion en general
        $instanciamodelohosp = new HospedajeXServicio();
        $instanciamodelohosp->Hospedajes_id = $Hospedajes_id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->servicio_adi = $servicio_adi;
        $this->costo = $costo;
        $this->insertar();
        $objetoretornadoconsulta = $this->consultarultimohospedaje(); 
        $instanciamodelohosp->Servicios_id = $objetoretornadoconsulta[0];
        $instanciamodelohosp->insetartablaintermedia();
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
        require '../vistas/servicios/mostrar.php';
    }
      public function mostrarservicios(){
        // echo "Estamos llegando a la funcion Mostrar";
        $mostrarservicios = $this->mostrar();
        require '../inicio/servicios.php';
    }
        public function detalleservicio($id){
        $this->id = $id;
        $detalleservicio = $this->detaser();
        require '../inicio/detalleservicio.php';
    }
    public function verificacionmostrarservicios(){
       
        $hospedaje = new Hospedaje();
        $objetoretornadohospedaje = $this->mostrarhospedajes();
        require '../vistas/servicios/formulario.php';
    }
       
    public function verificacionactualizar($id){
        $this->id = $id;
        $objetoretornado = $this->actualizar();
       
        require '../vistas/servicios/actualizar.php';
    }
    public function verificacionactualizarinsertar($id,$nombre,$descripcion,$servicio_adi,$costo){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->servicio_adi = $servicio_adi;
        $this->costo = $costo;
        $this->actualizarinsertar();
        $this->redireccionarmostrar();
    }

    public function redireccionar(){
        header("location:  ServicioControlador.php?accion=mostrar");
    }
    public function redireccionarmostrar(){
        header("location: ServicioControlador.php?accion=mostrar");
}
}

?>

<?php

   if (isset($_GET['accion']) && $_GET['accion']=="inicio") {
        $instanciacontrolador = new ServicioControlador();
        $instanciacontrolador->mostrarservicios();
    }
       if (empty($_SESSION['email'])){
        if (isset($_GET['accion']) && $_GET['accion']=='ver') {
            $instanciacontrolador = new ServicioControlador();
            $id = $_GET['id'];
            $instanciacontrolador->detalleservicio($id);
        }

    }
if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){  
    if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
        $instanciacontrolador = new ServicioControlador();
        $instanciacontrolador->verificacionmostrarservicios();
    }

    if (isset($_POST['accion']) &&$_POST['accion']=="insertar") {
        if(isset($_POST['nombre'])&&isset($_POST['descripcion'])&&isset($_POST['adicional'])&&isset($_POST['costo'])){
            $instanciacontrolador = new ServicioControlador();
            $instanciacontrolador->verificacioninsertar($_POST['nombre'],$_POST['descripcion'],$_POST['adicional'],$_POST['costo'],$_POST['Hospedajes_id']);
      
           
        }
    

    else {
        echo "Falto la Informacion por Llegar";
    }
}


    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new ServicioControlador();
        $instanciacontrolador->verificacionmostrar();
    }
    if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
        $instanciacontrolador = new ServicioControlador();
        $id = $_GET['id'];
        $instanciacontrolador->verificacioneliminar($id);
    }
    if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
        $instanciacontrolador = new ServicioControlador();
         $id = $_GET['id'];
         $instanciacontrolador->verificacionactualizar($id);
     }
 
     if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
         if (isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['descripcion'])&&isset($_POST['adicional'])&&isset($_POST['costo'])) {
          $instanciacontrolador = new ServicioControlador();
          $instanciacontrolador->verificacionactualizarinsertar($_POST['id'],$_POST['nombre'],$_POST['descripcion'],$_POST['adicional'],$_POST['costo']);
         }
         else {
             echo "Error al enviar la informacion";
         }
     }
    }
    if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){  
        if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new ServicioControlador();
        $instanciacontrolador->verificacionmostrar();
    }
    }
    
    


    

?>