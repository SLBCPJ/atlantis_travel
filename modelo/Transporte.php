<?php

class Transporte{

    public $id;
    public $nombre;
    public $descripcion;

    function __construct(){ 
    }
    
    public function insertar(){
            $instanciaconexion = new Conexion();
          
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO transportes (nombre_tran,descripcion_tran)values(?,?)");
            $insertar->bindParam(1,$this->nombre);
            $insertar->bindParam(2,$this->descripcion); 
            $insertar->execute();
            $instanciaconexion->cerrarconexion();
    }
    public function mostrar(){
            $instanciaconexion = new Conexion();
            $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM transportes");
            $datosusuario->execute();
            $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $usuarioobjeto;
    }

    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM transportes where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
    }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM transportes where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
    }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("UPDATE transportes set nombre_tran='$this->nombre', descripcion_tran='$this->descripcion' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
    }
}


?>