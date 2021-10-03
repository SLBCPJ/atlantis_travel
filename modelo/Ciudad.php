<?php

class Ciudad{

    public $id;
    public $nombre;
    public $descripcion;
    public $Paises_id;
 

    function __construct(){
        
       
    }
    public function consultarultimo(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from ciudades"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }
    
    public function insertar(){
            $instanciaconexion = new Conexion();
          
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO ciudades (nombre_ciud,descripcion_ciud,Paises_id)values(?,?,?)");
            $insertar->bindParam(1,$this->nombre);
            $insertar->bindParam(2,$this->descripcion);
            $insertar->bindParam(3,$this->Paises_id);
            $insertar->execute();
            $instanciaconexion->cerrarconexion();
    }
    public function mostrar(){
            $instanciaconexion = new Conexion();
            $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM ciudades");
            $datosusuario->execute();
            $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $usuarioobjeto;
    }
    public function mostrarpaises(){
        $instanciaconexion = new Conexion();
        $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM paises");
        $datosusuario->execute();
        $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
        return $usuarioobjeto;
}

// public function mostrarhospedajes(){
//     $instanciaconexion = new Conexion();
//     $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes");
//     $datosusuario->execute();
//     $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
//     return $usuarioobjeto;
// }

    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM ciudades where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
    }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM ciudades where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
    }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("UPDATE ciudades set nombre_ciud='$this->nombre', descripcion_ciud='$this->descripcion' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
    }
}


?>