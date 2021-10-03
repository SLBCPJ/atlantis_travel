<?php
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
require_once '../modelo/Servicio.php';
require_once '../modelo/Paquete.php';
require_once '../modelo/PaqueteXServicio.php';
require_once '../config/conexion.php';

class PaqueteXServicioControlador extends PaqueteXServicio{
    public function __construct(){}
        public function mostrardetalle($id){
            $instanciamodelopaque = new Paquete();
            $instanciamodelopaque->id = $id;
            $objetoretornadopxs = $instanciamodelopaque->actualizar();
            // var_dump($objetoretornadohxs);
            $this->id = $id;
            $objetoretornadoservi = $this->consultartabladetalle();
            // var_dump($objetoretornadoconsultaclientexusuario);
           
            require '../vistas/paquetes/detalle.php';
        }
    }
        if(isset($_GET['accion'])&&$_GET['accion']=="detalle") {
            $instanciacontrolador = new PaqueteXServicioControlador();
            $instanciacontrolador->mostrardetalle($_GET['id']);
        }




    ?>