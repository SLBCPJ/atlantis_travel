<?php
require '../modelo/Cotizacion.php';
require '../modelo/Hospedaje.php';
require '../modelo/HospedajeXCotizacion.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class HospedajeXCotizacionControlador extends HospedajeXCotizacion{
    public function __construct(){}
        public function mostrardetalle($id){
            $instanciamodelo= new Cotizacion();
            $instanciamodelo->id = $id;
            $objetoretornadoccotixhosp = $instanciamodelo->actualizar();
            // var_dump($objetoretornadousuario);
            $this->id = $id;
            $objetoretornadohosp = $this->consultartabladetalle();
            // var_dump($objetoretornadoccotixpaqu);
           
            require '../vistas/cotizacion/detalle.php';
        }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new HospedajeXCotizacionControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }





    ?>
