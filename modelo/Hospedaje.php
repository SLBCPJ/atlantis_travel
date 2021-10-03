<?php
class Hospedaje{

    public $id;
    public $nombre;
    public $estrellas;
    public $habitaciones;
    public $descri;
    public $wifi;
    public $aire;
    public $piscina;
    public $parqueadero;
    public $foto;
    public $foto_url;
    public $precio;
    public $temporal;
    public $ciudades_id;
    function __construct(){}

       
     public function guardar(){
        $instanciaconexion = new Conexion();
        $insertar = $instanciaconexion->datos->prepare("INSERT INTO hospedajes (nombre_hosp,estrellas_hosp,habitaciones_hosp,descripcion_hosp,wifi_hosp,aire_acondicionado_hosp,piscina_hosp,parqueadero_hosp,foto_hosp,foto_url_hosp,precio_hosp,Ciudades_id)values(?,?,?,?,?,?,?,?,?,?,?,?)");
        $insertar->bindParam(1,$this->nombre);
        $insertar->bindParam(2,$this->estrellas); 
        $insertar->bindParam(3,$this->habitaciones);
        $insertar->bindParam(4,$this->descri);
        $insertar->bindParam(5,$this->wifi);
        $insertar->bindParam(6,$this->aire);
        $insertar->bindParam(7,$this->piscina);
        $insertar->bindParam(8,$this->parqueadero);
        $insertar->bindParam(9,$this->foto);
        $insertar->bindParam(10,$this->foto_url);
        $insertar->bindParam(11,$this->precio);
        $insertar->bindParam(12,$this->ciudades_id);
        $insertar->execute();
        $instanciaconexion->cerrarconexion();
        }
    public function consultar(){
        $instanciaconexion = new Conexion();
        $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes");
        $datosusuario->execute();
        $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
    }
    public function mostrarciudades(){
        $instanciaconexion = new Conexion();
        $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM ciudades");
        $datosusuario->execute();
        $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
        return $usuarioobjeto;
    }

    public function eliminar(){
    $instanciaconexion = new Conexion();
    $elimine = $instanciaconexion->datos->prepare("DELETE FROM hospedajes where id='$this->id'");
    $elimine->execute();
    $instanciaconexion->cerrarconexion();
    }
    public function detahosp(){
        $instanciaconexion = new Conexion();
        $ver = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes where id='$this->id'");
        $ver->execute();
        $usuarioobjeto = $ver->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }
    public function actualizar(){
    $instanciaconexion = new Conexion();
    $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes where id='$this->id'");
    $actualizar->execute();
    $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $actualizarobjeto;
    }
    public function actualizarinsertar(){
    $instanciaconexion = new Conexion();
     $actualizar = $instanciaconexion->datos->prepare("UPDATE hospedajes set nombre_hosp='$this->nombre', estrellas_hosp='$this->estrellas',habitaciones_hosp='$this->habitaciones', descripcion_hosp='$this->descri', wifi_hosp='$this->wifi',aire_acondicionado_hosp='$this->aire',piscina_hosp='$this->piscina',parqueadero_hosp='$this->parqueadero',foto_hosp='$this->foto',foto_url_hosp='$this->foto_url',precio_hosp='$this->precio' where id='$this->id'");
    $actualizar->execute();
    $instanciaconexion->cerrarconexion();
    }
}