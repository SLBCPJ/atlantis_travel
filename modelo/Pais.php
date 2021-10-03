<?php

class Pais{

    public $id;
    public $nombre;
    public $descripcion;

    function __construct(){
        
       
    }
    
    public function insertar(){
            $instanciaconexion = new Conexion();
          
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO paises (nombre_pais,descripcion_pais)values(?,?)");
            $insertar->bindParam(1,$this->nombre);
            $insertar->bindParam(2,$this->descripcion); 
            $insertar->execute();
            $instanciaconexion->cerrarconexion();
    }
    public function mostrar(){
            $instanciaconexion = new Conexion();
            $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM paises");
            $datosusuario->execute();
            $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $usuarioobjeto;
    }

    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM paises where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
    }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM paises where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
    }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("UPDATE paises set nombre_pais='$this->nombre', descripcion_pais='$this->descripcion' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
    }
}


?>