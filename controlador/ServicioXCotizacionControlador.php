<?php
require '../modelo/Cotizacion.php';
require '../modelo/Servicio.php';
require '../modelo/ServicioXCotizacion.php';
require '../config/conexion.php';
require 'IniciadorControlador.php';
$instanciar = new Iniciador();
class ServicioXCotizacionControlador extends ServicioXCotizacion{
    public function __construct(){}
        public function mostrardetalle($idusuario){
            $instanciamodeloservi= new Servicio();
            $instanciamodeloservi->id = $id;
            $objetoretornadousuario = $instanciamodeloservi->actualizar();
            // var_dump($objetoretornadousuario);
            $this->id = $id;
            $objetoretornadoccotixservi = $this->consultartabladetalle();
            // var_dump($objetoretornadoccotixpaqu);
           
            require '../vistas/cotizacion/detalle.php';
        }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new ServicioXCotizacionControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }





    ?>
