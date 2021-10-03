<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require_once '../modelo/Cotizacion.php';
require_once '../modelo/Cliente.php';
require_once '../modelo/Ciudad.php';
require_once '../modelo/Paquete.php';
require_once '../modelo/Servicio.php';
require_once '../modelo/Hospedaje.php';
require_once '../modelo/Transporte.php';
require_once '../modelo/CotizacionXPaquete.php';
require_once '../modelo/CotizacionXTransporte.php';
require_once '../modelo/ServicioXCotizacion.php';
require_once '../modelo/HospedajeXCotizacion.php';
require_once '../config/conexion.php';
class CotizacionControl extends Cotizacion{

    public function __construct(){}
        public function verificacioninsertar($fecha_salida,$fecha_llegada,$adultos,$menores,$precio,$Clientes_id,$Ciudades_id,$Paquetes_id,$Transportes_id,$Servicios_id,$Hospedajes_id){
            //Espacio para validar la informacion en general
            $instanciamodelopaqu = new CotizacionXPaquete();
            $instanciamodelopaqu->Paquetes_id = $Paquetes_id;
            $instanciamodelotrans = new CotizacionXTransporte();
            $instanciamodelotrans->Transportes_id = $Transportes_id;
            $instanciamodeloservi = new ServicioXCotizacion();
            $instanciamodeloservi->Servicios_id = $Servicios_id;
            $instanciamodelohosp = new HospedajeXCotizacion();
            $instanciamodelohosp->Hospedajes_id = $Hospedajes_id;
             $this->fecha_salida = $fecha_salida;
             $this->fecha_llegada = $fecha_llegada;
             $this->adultos = $adultos;
             $this->menores = $menores;
             $this->precio = $precio;
             $this->Clientes_id = $Clientes_id;
             $this->Ciudades_id = $Ciudades_id;
             $this->insertar();
            $objetoretornadoconsulta = $this->consultarultimo(); //para la tabla intermedia
            $instanciamodelopaqu->Cotizacion_id = $objetoretornadoconsulta[0];
            $instanciamodelopaqu->insetartablaintermedia();
            $objetoretornadoconsulta = $this->consultarultimotransporte(); //para la tabla intermedia
            $instanciamodelotrans->Cotizacion_id = $objetoretornadoconsulta[0];
            $instanciamodelotrans->insetartablaintermedia();
            $objetoretornadoconsulta = $this->consultarultimoservicio(); //para la tabla intermedia
            $instanciamodeloservi->Cotizacion_id = $objetoretornadoconsulta[0];
            $instanciamodeloservi->insetartablaintermedia();
            $objetoretornadoconsulta = $this->consultarultimohospedaje(); //para la tabla intermedia
            $instanciamodelohosp->Cotizacion_id = $objetoretornadoconsulta[0];
            $instanciamodelohosp->insetartablaintermedia();
             $this->redireccionar();
            // echo "El ultimo Id es: " .$instanciamodelopaqu->cotizacion_id;
        }
    
    public function verificacioneliminar($id){
        $this->id = $id;
        $this->eliminar();
        $this->redireccionarmostrar();
     }
    
    public function verificacionmostrar(){
        // echo "Estamos llegando a la funcion Mostrar";
        $objetoretornado = $this->mostrar();
        $c  = new Cliente();
        $ciudad = new Ciudad();
        $paquete = new Paquete();
        $objetoretornadocliente = $this->mostrarclientes();
        $objetoretornadociudad = $this->mostrarciudades();
        $objetoretornadopaquete = $this->mostrarpaquetes();
      
        $clie = array_unique($objetoretornadocliente,SORT_REGULAR);
        $ciud = array_unique($objetoretornadociudad,SORT_REGULAR);
        // $paqu = array_unique($objetoretornadopaquete,SORT_REGULAR);
        require '../vistas/cotizacion/mostrar.php';
    }
    public function verificacionmostrarforaneas(){
        // echo "Estamos llegando a la funcion Mostrar";
        $c  = new Cliente();
        $ciudad = new Ciudad();
        $paquete = new Paquete();
        $servicio = new Servicio();
        $hospedaje = new Hospedaje();
        $transporte = new Transporte();
        $objetoretornadociudad = $this->mostrarciudades();
        $objetoretornadocliente = $this->mostrarclientes();
        $objetoretornadopaquete = $this->mostrarpaquetes();
        $objetoretornadoservicio = $this->mostrarservicios();
        $objetoretornadohospedaje = $this->mostrarhospedajes();
        $objetoretornadotransporte = $this->mostrartransportes();
        $paq = array_unique($objetoretornadopaquete,SORT_REGULAR);
        $tran = array_unique($objetoretornadotransporte,SORT_REGULAR);
        // var_dump($objetoretornadopaquete);
        require '../vistas/cotizacion/formulario.php';
    }


    public function verificacionactualizar($id){
        $this->id = $id;
        $objetoretornado = $this->actualizar();
        $objetoretornadociudad = $this->mostrarciudades();
        $objetoretornadocliente = $this->mostrarclientes();
        require '../vistas/cotizacion/actualizar.php';
    }
    public function verificacionactualizarinsertar($id,$fecha_salida,$fecha_llegada,$adultos,$menores,$precio,$Clientes_id,$Ciudades_id){
        $this->id = $id;
        $this->fecha_salida = $fecha_salida;
        $this->fecha_llegada = $fecha_llegada;
        $this->adultos = $adultos;
        $this->menores = $menores;
        $this->precio = $precio;
        $this->Clientes_id = $Clientes_id;
        $this->Ciudades_id = $Ciudades_id;
        $this->actualizarinsertar();
        $this->redireccionarmostrar();
    }
    public function imprimir($id){
        $this->id = $id;
        $retornado = $this->imprimircoti();
        require '../vistas/cotizacion/imprimir.php';
    }
    public function redireccionar(){
        header("location:  CotizacionControl.php?accion=mostrar");
    }
    public function redireccionarmostrar(){
        header("location: CotizacionControl.php?accion=mostrar");
    }
}




if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")){ 
    if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
        $instanciacontrolador = new CotizacionControl();
        $instanciacontrolador->verificacionmostrarforaneas(); 
    }
    if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
        if(isset($_POST['fecha_salida'])&&isset($_POST['fecha_llegada'])&&isset($_POST['adultos'])&&isset($_POST['menores']) &&isset($_POST['precio'])&&isset($_POST['clientes'])&&isset($_POST['ciudades'])){
            $instanciacontrolador = new CotizacionControl();
            $instanciacontrolador->verificacioninsertar($_POST['fecha_salida'],$_POST['fecha_llegada'],$_POST['adultos'],$_POST['menores'],$_POST['precio'],$_POST['clientes'],$_POST['ciudades'],$_POST['Paquetes_id'],$_POST['Transportes_id'],$_POST['Servicios_id'],$_POST['Hospedajes_id']);  
                
        }
    else {
        echo "Falto la Informacion por Llegar";
    }
    }
    // else{
    //     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
    // }
    
    
    
    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new CotizacionControl();
        $instanciacontrolador->verificacionmostrar();
    }
    if (isset($_GET['accion']) && $_GET['accion']=='imprimir') {
        $instanciacontrolador = new CotizacionControl();
        $id = $_GET['id'];
         $instanciacontrolador->imprimir($id);
     }
}
if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){  
if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
    $instanciacontrolador = new CotizacionControl();
    $instanciacontrolador->verificacionmostrarforaneas(); 
}
if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
    if(isset($_POST['fecha_salida'])&&isset($_POST['fecha_llegada'])&&isset($_POST['adultos'])&&isset($_POST['menores']) &&isset($_POST['precio'])&&isset($_POST['clientes'])&&isset($_POST['ciudades'])){
        $instanciacontrolador = new CotizacionControl();
        $instanciacontrolador->verificacioninsertar($_POST['fecha_salida'],$_POST['fecha_llegada'],$_POST['adultos'],$_POST['menores'],$_POST['precio'],$_POST['clientes'],$_POST['ciudades'],$_POST['Paquetes_id'],$_POST['Transportes_id'],$_POST['Servicios_id'],$_POST['Hospedajes_id']);  
            
    }
else {
    echo "Falto la Informacion por Llegar";
}
}
// else{
//     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
// }



if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
    $instanciacontrolador = new CotizacionControl();
    $instanciacontrolador->verificacionmostrar();
}
if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
    $instanciacontrolador = new CotizacionControl();
    $id = $_GET['id'];
    $instanciacontrolador->verificacioneliminar($id);
}
if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
    $instanciacontrolador = new CotizacionControl();
     $id = $_GET['id'];
     $instanciacontrolador->verificacionactualizar($id);
 }

 if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
    if(isset($_POST['id'])&&isset($_POST['fecha_salida'])&&isset($_POST['fecha_llegada'])&&isset($_POST['adultos'])&&isset($_POST['menores']) &&isset($_POST['precio'])&&isset($_POST['clientes'])&&isset($_POST['ciudades'])){
      $instanciacontrolador = new CotizacionControl();
      $instanciacontrolador->verificacionactualizarinsertar($_POST['id'],$_POST['fecha_salida'],$_POST['fecha_llegada'],$_POST['adultos'],$_POST['menores'],$_POST['precio'],$_POST['clientes'],$_POST['ciudades']);
     }
     else {
         echo "Error al enviar la informacion";
     }
 }
 if (isset($_GET['accion']) && $_GET['accion']=='imprimir') {
    $instanciacontrolador = new CotizacionControl();
    $id = $_GET['id'];
     $instanciacontrolador->imprimir($id);
 }
}

?>

