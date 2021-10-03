<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require '../modelo/Servicio.php';
require '../modelo/Hospedaje.php';
require '../modelo/HospedajeXServicio.php';
require '../config/conexion.php';

class HospedajeXServicioControlador extends HospedajeXServicio{
    public function __construct(){}
        public function mostrardetalle($id){
            $instanciamodeloservi = new Servicio();
            $instanciamodeloservi->id = $id;
            $objetoretornadohxs = $instanciamodeloservi->actualizar();
            // var_dump($objetoretornadohxs);
            $this->id = $id;
            $objetoretornadohosp = $this->consultartabladetalle();
            // var_dump($objetoretornadoconsultaclientexusuario);
           
            require '../vistas/servicios/detalle.php';
        }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new HospedajeXServicioControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }




    ?>