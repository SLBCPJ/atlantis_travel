<?php
require '../modelo/Cliente.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class ClienteControlador extends Cliente{

    public function __construct(){}
    public function verificacioninsertar($tipoid,$numeroid,$nombre,$apellido,$fechanaci,$telefono,$celular,$direcion,$email,$contrasena,$genero,$estadoci){
        $this->tipoid    = $tipoid;
        $this->numeroid  = $numeroid;
        $this->nombre    = $nombre;
        $this->apellido  = $apellido;
        $this->fechanaci = $fechanaci;
        $this->telefono  = $telefono;
        $this->celular  = $celular;
        $this->direcion   = $direcion;
        $this->email     = $email;
        $this->contrasena  = $contrasena;
        $this->genero  = $genero;
     
        $this->estadoci  = $estadoci;
        var_dump($tipoid,$numeroid,$nombre,$apellido,$fechanaci,$telefono,$celular,$direcion,$email,$contrasena,$genero,$estadoci);
        $this->guardar();
        $this->redireccionarmostrar();
    }
    public function eliminar1($id){
        $this->id = $id;
        $this->eliminar();
        $this->redireccionarmostrar();
     }
     public function mostrar(){
       
         $retornado = $this->consultar();
         require '../vistas/cliente/mostrar.php';
     }
     public function verificacionmostrarclientes(){
        // echo "Estamos llegando a la funcion Mostrar";
        require '../vistas/cliente/formulario.php';
    }
 
     public function actualizar1($id){
         $this->id = $id;
         $retornado = $this->actualizar();
        
         require '../vistas/cliente/actualizar.php';
     }
     public function actualizarinsertar2($id,$tipoid,$numeroid,$nombre,$apellido,$fechanaci,$telefono,$celular,$direcion,$email,$genero,$estado){
        $this->id = $id;
        $this->tipoid    = $tipoid;
        $this->numeroid  = $numeroid;
        $this->nombre    = $nombre;
        $this->apellido  = $apellido;
        $this->fechanaci = $fechanaci;
        $this->telefono  = $telefono;
        $this->celular  = $celular;
        $this->direcion   = $direcion;
        $this->email     = $email;
        $this->genero  = $genero;
        $this->estado    = $estado;
         $this->actualizarinsertar();
         $this->redireccionarmostrar();
     }
     public function imprimir($id){
        $this->id = $id;
        $retornado = $this->imprimir1();
        require '../vistas/cliente/imprimir.php';
    } 
    public function perfil($id){
        $this->id = $id;
        $perfil = $this->verperfil();
        require '../vistas/cliente/verperfil.php';
    }
     
 
     public function redireccionar(){
         header("location: ClienteControlador.php?accion=mostrar");
 }
   public function redireccionarmostrar(){
    header("location: ClienteControlador.php?accion=mostrar");
       }
 }
 
 

 if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){
if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
    $instanciacontrolador = new ClienteControlador();
    $instanciacontrolador->verificacionmostrarclientes();
}

if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
    if(isset($_POST['tipoid'])&&isset($_POST['numeroid'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['fechanaci'])&&isset($_POST['telefono'])&&isset($_POST['celular'])&&isset($_POST['direccion'])&&isset($_POST['email'])&&isset($_POST['contrasena'])&&isset($_POST['genero'])&&isset($_POST['estado'])){
        $instanciacontrolador = new ClienteControlador();
        $instanciacontrolador->verificacioninsertar($_POST['tipoid'],$_POST['numeroid'],$_POST['nombre'],$_POST['apellido'],$_POST['fechanaci'],$_POST['telefono'],$_POST['celular'],$_POST['direccion'],$_POST['email'],$_POST['contrasena'],$_POST['genero'],$_POST['estado']);
    }
    
    
    else {
        echo "Falto la Informacion por Llegar";
    }
}
// else{
    //     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
    // }
    
    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new ClienteControlador();
        $instanciacontrolador->mostrar();
    }
    
   
    if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
            $instanciacontrolador = new ClienteControlador();
            $id = $_GET['id'];
            $instanciacontrolador->eliminar1($id);
        }
        
        if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
            $instanciacontrolador = new ClienteControlador();
            $id = $_GET['id'];
            $instanciacontrolador->actualizar1($id);
        }
        
        if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
            if(isset($_POST['id'])&&isset($_POST['tipoid'])&&isset($_POST['numeroid'])&&isset($_POST['nombre'])&&isset($_POST['apellido'])&&isset($_POST['fechanaci'])&&isset($_POST['telefono'])&&isset($_POST['celular'])&&isset($_POST['direccion'])&&isset($_POST['email'])&&isset($_POST['genero'])&&isset($_POST['estado'])){
                $instanciacontrolador = new ClienteControlador();
                $instanciacontrolador->actualizarinsertar2($_POST['id'],$_POST['tipoid'],$_POST['numeroid'],$_POST['nombre'],$_POST['apellido'],$_POST['fechanaci'],$_POST['telefono'],$_POST['celular'],$_POST['direccion'],$_POST['email'],$_POST['genero'],$_POST['estado']);
                
            }
            else {
                echo "Error al enviar la informacion";
            }
        }
        if (isset($_GET['accion']) && $_GET['accion']=='imprimir') {
            $instanciacontrolador = new ClienteControlador();
            $id = $_GET['id'];
            $instanciacontrolador->imprimir($id);
        }
        if (isset($_GET['accion']) && $_GET['accion']=='perfil') {
            $instanciacontrolador = new ClienteControlador();
            $id = $_GET['id'];
            $instanciacontrolador->perfil($id);
        }
    }
    if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){

        
        if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
            $instanciacontrolador = new ClienteControlador();
            $instanciacontrolador->mostrar();
           }
           
           
           if (isset($_GET['accion']) && $_GET['accion']=='imprimir') {
               $instanciacontrolador = new ClienteControlador();
               $id = $_GET['id'];
               $instanciacontrolador->imprimir($id);
           }
       }
        ?>