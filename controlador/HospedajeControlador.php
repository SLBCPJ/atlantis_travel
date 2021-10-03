<?php
require '../modelo/Hospedaje.php';
require '../modelo/Ciudad.php';
// require '../modelo/HospedajesxServicios.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class HospedajeControlador extends Hospedaje{

    public function __construct(){}
    public function verificacioninsertar($nombre,$estrellas,$habitaciones,$descri,$wifi,$aire,$piscina,$parqueadero,$namefoto,$temp,$urlfoto,$precio,$ciudades_id){

        // $instanciamodelocliente = new HospedajesxServicios();
        // $instanciamodelocliente->Servicios_id = $Servicios_id;
        $this->nombre    = $nombre;
        $this->estrellas  = $estrellas;
        $this->habitaciones  = $habitaciones;
        $this->descri = $descri;
        $this->wifi  = $wifi;
        $this->aire  = $aire;
        $this->piscina  = $piscina;
        $this->parqueadero = $parqueadero;
        $this->foto =  $namefoto;
        $this->temporal = $temp;
        $this->precio = $precio;
        $this->foto_url =  $urlfoto;
        $this->ciudades_id  = $ciudades_id;
        $this->guardar();
        move_uploaded_file($this->temporal,$this->foto_url);
        // $objetoretornadoconsulta = $this->consultarultimo(); //para la tabla intermedia
        // $instanciamodelocliente->hospedajes_id = $objetoretornadoconsulta[0];
        // // $this->redireccionarmostrar();
        // $instanciamodelocliente->insetartablaintermedia();
        $this->redireccionar();
    }
    public function mostrarhospedajes(){
        // echo "Estamos llegando a la funcion Mostrar";
        $mostrarhospedaje = $this->consultar();
        require '../inicio/hospedajes.php';
    }
    public function eliminar1($id,$foto_url){
        $this->id = $id;
        $this->eliminar();
        unlink($foto_url);
        $this->redireccionarmostrar();
     }
     public function verificacionmostrarforaneas(){
        $ciudad = new Ciudad();
        // echo "Estamos llegando a la funcion Mostrar";
        $objetoretornadociudad = $this->mostrarciudades();
        $ciudad = array_unique($objetoretornadociudad,SORT_REGULAR);
        
        require '../vistas/hospedajes/formulario.php';
    }
     public function mostrar(){
       
         $retornado = $this->consultar();
         require '../vistas/hospedajes/mostrar.php';
     }
    //  public function verificacionmostrarhospedaje(){
    //     // echo "Estamos llegando a la funcion Mostrar";
    //     require '../vistas/hospedajes/formulario.php';
    // }
 
     public function actualizar1($id){
         $this->id = $id;
         $retornado = $this->actualizar();
        
         require '../vistas/hospedajes/actualizar.php';
     }
     public function hosp($id){
        $this->id = $id;
        $perfil = $this->detahosp();
        require '../vistas/hospedajes/vermas.php';
    }
       public function actualizarinsertar2($id,$nombre,$estrellas,$habitaciones,$descri,$wifi,$aire,$piscina,$parqueadero,$namefoto,$temp,$urlfoto,$precio){
        $this->id = $id;
        $this->nombre = $nombre;
        $this->estrellas = $estrellas;
        $this->habitaciones = $habitaciones;
        $this->descri = $descri;
        $this->wifi = $wifi;
        $this->aire = $aire;
        $this->piscina = $piscina;
        $this->parqueadero = $parqueadero;
        $this->foto =  $namefoto;
        $this->foto_url =  $urlfoto;
        $this->temporal = $temp;
        $this->precio = $precio;
        // var_dump($id,$nombre,$estrellas,$habitaciones,$descri,$wifi,$aire,$piscina,$parqueadero);
        $this->actualizarinsertar();
        copy($this->temporal,$this->foto_url);
        $this->redireccionarmostrar();
     }
     public function detallehospedaje($id){
        $this->id = $id;
        $detallehospedaje = $this->detahosp();
        require '../inicio/detallehospedaje.php';
    }
     public function redireccionar(){
         header("location: HospedajeControlador.php?accion=mostrar");
     }
     public function redireccionarmostrar(){
         header("location: HospedajeControlador.php?accion=mostrar");
 }
 }
 


    
    if (empty($_SESSION['email'])){
        if (isset($_GET['accion']) && $_GET['accion']=="inicio") {
        $instanciacontrolador = new HospedajeControlador();
        $instanciacontrolador->mostrarhospedajes();
         
    }

    }
    if (empty($_SESSION['email'])){
        if (isset($_GET['accion']) && $_GET['accion']=='ver') {
            $instanciacontrolador = new HospedajeControlador();
            $id = $_GET['id'];
            $instanciacontrolador->detallehospedaje($id);
        }

    }




   if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){  
if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
    $instanciacontrolador = new HospedajeControlador();
    $instanciacontrolador->verificacionmostrarforaneas(); 
}

        // if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
        //     $instanciacontrolador = new HospedajeControlador();
        //     $instanciacontrolador->verificacionmostrarhospedaje();
        // }
     if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
         if(isset($_POST['nombre'])&&isset($_POST['estrellas'])&&isset($_POST['habitaciones'])&&isset($_POST['descri'])&&isset($_POST['wifi'])&&isset($_POST['aire'])&&isset($_POST['piscina'])&&isset($_POST['parqueadero'])&&isset($_FILES['foto'])&&isset($_POST['precio'])&&isset($_POST['ciudades'])){
            $namefoto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $urlfoto = "../img/imgHospedajes/" . $namefoto;
            $instanciacontrolador = new HospedajeControlador();
             $instanciacontrolador->verificacioninsertar($_POST['nombre'],$_POST['estrellas'],$_POST['habitaciones'],$_POST['descri'],$_POST['wifi'],$_POST['aire'],$_POST['piscina'],$_POST['parqueadero'],$namefoto,$temp,$urlfoto,$_POST['precio'],$_POST['ciudades']);
         }
     
 
     else {
         echo "Falto la Informacion por Llegar";
     }
 }
     // else{
     //     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
     // }
 
     if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
         $instanciacontrolador = new HospedajeControlador();
         $instanciacontrolador->mostrar();
     }
 
     if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
         $instanciacontrolador = new HospedajeControlador();
         $id = $_GET['id'];
         $foto_url = $_GET['foto_url_hosp'];
         $instanciacontrolador->eliminar1($id,$foto_url);
     }
     if (isset($_GET['accion']) && $_GET['accion']=='detahosp') {
        $instanciacontrolador = new HospedajeControlador();
        $id = $_GET['id'];
        $instanciacontrolador->hosp($id);
    }
    
     if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
        $instanciacontrolador = new HospedajeControlador();
         $id = $_GET['id'];
         $instanciacontrolador->actualizar1($id);
     }
 
       
     if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
        if(isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['estrellas'])&&isset($_POST['habitaciones'])&&isset($_POST['descri'])&&isset($_POST['wifi'])&&isset($_POST['aire'])&&isset($_POST['piscina'])&&isset($_POST['parqueadero'])){
            $namefoto = $_FILES['foto']['name'];
            $temp = $_FILES['foto']['tmp_name'];
            $urlfoto = "../img/imgPaquete/" . $namefoto;
            $instanciacontrolador = new HospedajeControlador();
            $instanciacontrolador->actualizarinsertar2($_POST['id'],$_POST['nombre'],$_POST['estrellas'],$_POST['habitaciones'],$_POST['descri'],$_POST['wifi'],$_POST['aire'],$_POST['piscina'],$_POST['parqueadero'],$namefoto,$temp,$urlfoto,$_POST['precio']);
           
        }
        else {
            echo "Error al enviar la informacion";
        }
    }
}
  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){ 
   if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
         $instanciacontrolador = new HospedajeControlador();
         $instanciacontrolador->mostrar();
     }
          if (isset($_GET['accion']) && $_GET['accion']=='detahosp') {
        $instanciacontrolador = new HospedajeControlador();
        $id = $_GET['id'];
        $instanciacontrolador->hosp($id);
    }
     
     }
 
 ?>