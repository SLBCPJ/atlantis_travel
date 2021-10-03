<?php
class Servicio{

    public $id;
    public $nombre;
    public $descripcion;
    public $servicio_adi;
    public $costo;

    function __construct(){
    }

    public function consultarultimohospedaje(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from servicios"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }


    public function insertar(){
        $instanciaconexion = new Conexion();

        $insertar = $instanciaconexion->datos->prepare("INSERT INTO servicios (nombre_serv,descripcion_serv,servicios_adi_serv,costo_serv)values(?,?,?,?)");
        $insertar->bindParam(1,$this->nombre);
        $insertar->bindParam(2,$this->descripcion); 
        $insertar->bindParam(3,$this->servicio_adi);
        $insertar->bindParam(4,$this->costo);
        $insertar->execute();
        $instanciaconexion->cerrarconexion();
}
public function mostrar(){
    $instanciaconexion = new Conexion();
    $datospaquete = $instanciaconexion->datos->prepare("SELECT * FROM servicios");
    $datospaquete->execute();
    $usuarioobjeto = $datospaquete->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $usuarioobjeto;
}
public function mostrarhospedajes(){
    $instanciaconexion = new Conexion();
    $datos = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes");
    $datos->execute();
    $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
    return $objeto;
}
public function detaser(){
    $instanciaconexion = new Conexion();
    $ver = $instanciaconexion->datos->prepare("SELECT * FROM servicios where id='$this->id'");
    $ver->execute();
    $usuarioobjeto = $ver->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $usuarioobjeto;
    }
public function eliminar(){
    $instanciaconexion = new Conexion();
    $elimine = $instanciaconexion->datos->prepare("DELETE FROM servicios where id='$this->id'");
    $elimine->execute();
    $instanciaconexion->cerrarconexion();
}
public function actualizar(){
    $instanciaconexion = new Conexion();
    $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM servicios where id='$this->id'");
    $actualizar->execute();
    $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $actualizarobjeto;
}
public function actualizarinsertar(){
    $instanciaconexion = new Conexion();
    $actualizar = $instanciaconexion->datos->prepare("UPDATE servicios set nombre_serv='$this->nombre', descripcion_serv='$this->descripcion',servicios_adi_serv='$this->servicio_adi',costo_serv='$this->costo' where id='$this->id'");
    $actualizar->execute();
    $instanciaconexion->cerrarconexion();
}
}





?>