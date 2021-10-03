<?php
class Paquete{

    public $id;
    public $nombre;
    public $descripcion;
    public $duracion;
    public $fecha;
    public $obsequio;
    public $tour;
    public $precio;
    public $foto;
    public $foto_url;
    public $temporal;

    function __construct(){}
        public function consultarultimoservicio(){
            $instanciaconexion = new Conexion();
            $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from paquetes"); //max es para traer el ultimo numero
            $consulta->execute();
            return $consulta->fetch(); //fetch es para un arreglo
        }
    public function insertar(){
        $instanciaconexion = new Conexion();
        $insertar = $instanciaconexion->datos->prepare("INSERT INTO paquetes(nomb_paqu,descripcion_paqu,duracion_paqu,fecha_paqu,obsequio_paqu,tour_paqu,prec_paqu,foto_paqu,foto_url_paqu)values(?,?,?,?,?,?,?,?,?)");
        $insertar->bindParam(1,$this->nombre);
        $insertar->bindParam(2,$this->descripcion); 
        $insertar->bindParam(3,$this->duracion);
        $insertar->bindParam(4,$this->fecha);
        $insertar->bindParam(5,$this->obsequio);
        $insertar->bindParam(6,$this->tour);
        $insertar->bindParam(7,$this->precio);
        $insertar->bindParam(8,$this->foto);
        $insertar->bindParam(9,$this->foto_url);
        $insertar->execute();
        $instanciaconexion->cerrarconexion();
    }

    public function mostrar(){
        $instanciaconexion = new Conexion();
        $datospaquete = $instanciaconexion->datos->prepare("SELECT * FROM paquetes");
        $datospaquete->execute();
        $usuarioobjeto = $datospaquete->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
    }
    public function mostrarservicios(){
        $instanciaconexion = new Conexion();
        $datos = $instanciaconexion->datos->prepare("SELECT * FROM servicios");
        $datos->execute();
        $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
        return $objeto;
    }
    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM paquetes where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
    }
      public function detahosp(){
        $instanciaconexion = new Conexion();
        $ver = $instanciaconexion->datos->prepare("SELECT * FROM paquetes where id='$this->id'");
        $ver->execute();
        $usuarioobjeto = $ver->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM paquetes where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
    }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("UPDATE paquetes set nomb_paqu='$this->nombre', descripcion_paqu='$this->descripcion', duracion_paqu='$this->duracion', fecha_paqu='$this->fecha',obsequio_paqu='$this->obsequio',tour_paqu='$this->tour',prec_paqu='$this->precio',foto_paqu='$this->foto',foto_url_paqu='$this->foto_url' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
    }
}





?>