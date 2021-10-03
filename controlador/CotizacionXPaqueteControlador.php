<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require '../modelo/Paquete.php';
require '../modelo/Cotizacion.php';
require '../modelo/CotizacionXPaquete.php';
require '../modelo/CotizacionXTransporte.php';
require '../modelo/HospedajeXCotizacion.php';
require '../modelo/ServicioXCotizacion.php';
require '../config/conexion.php';
class CotizacionXPaqueteControlador extends CotizacionXPaquete{
    public function __construct(){}
        public function mostrardetalle($id){
            $instanciamodelo = new Cotizacion();
            $instanciamodelo->id = $id;
            $objetoretornadoccotixpaqu = $instanciamodelo->actualizar();
            // var_dump($objetoretornadoccotixpaqu);
            $this->id = $id;
            $objetoretornadopaquete = $this->consultartabladetalle();
            $objetoretornadotrans = $this->consultartabladetalletrans();
            $objetoretornadohosp = $this->consultartabladetallehosp();
            $objetoretornadoccotixservi = $this->consultartabladetalleservi();
            // var_dump($objetoretornadoccotixpaqu);
           
            require '../vistas/cotizacion/detalle.php';
        }
        // public function verificarmostrar(){
        //     $mostrarpaquete = $this->consultartabladetalle();
        //     require '../vistas/paquetes/mostrar.php';
            
        // }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new CotizacionXPaqueteControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }




    ?>