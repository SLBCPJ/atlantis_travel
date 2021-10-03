<?php
require '../modelo/Transporte.php';
require '../modelo/Cotizacion.php';
require '../modelo/CotizacionXTransporte.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class CotizacionXTransporteControlador extends CotizacionXTransporte{
    public function __construct(){}

        public function mostrardetalle($id){
            $instanciamodelotrans = new Cotizacion();
            $instanciamodelotrans->id = $id;
            $objetoretornadoccotixtrans = $instanciamodelotrans->actualizar();
            // var_dump($objetoretornadousuario);
            $this->id = $id;
            $objetoretornadotrans = $this->consultartabladetalle();
        
            // var_dump($objetoretornadotrans);
           
             //require '../vistas/cotizacion/detalle.php';
        }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new CotizacionXTransporteControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }




    ?>