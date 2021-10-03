<?php

class Usuario{

    public $id;
    public $nombre;
    public $email;
    public $rol;
    public $contrasena;

    function __construct(){}
    
    public function insertar(){
            $instanciaconexion = new Conexion();
          
            $newpassword = password_hash($this->contrasena, PASSWORD_BCRYPT);
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO usuarios (nombre_usua,email_usua,rol,contrasena_usua)values(?,?,?,?)");
            $insertar->bindParam(1,$this->nombre);
            $insertar->bindParam(2,$this->email); 
            $insertar->bindParam(3,$this->rol); 
            $insertar->bindParam(4,$newpassword);
            $insertar->execute();
            $instanciaconexion->cerrarconexion();
    }
    public function mostrar(){
            $instanciaconexion = new Conexion();
            $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM usuarios");
            $datosusuario->execute();
            $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $usuarioobjeto;
    }
    public function mostrarlogin(){
        $instanciaconexion = new Conexion();
        $login = $instanciaconexion->datos->prepare("SELECT * FROM usuarios where email_usua='$this->email_usua'"); //instanciar
        $login->execute();
        $loginobjecto = $login->fetchAll(PDO::FETCH_OBJ); 
        //$instanciaconexion->cerrarconexion();
        return $loginobjecto;
    }

    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM usuarios where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
    }
    public function verperfil(){
        $instanciaconexion = new Conexion();
        $ver = $instanciaconexion->datos->prepare("SELECT * FROM usuarios where id='$this->id'");
        $ver->execute();
        $usuarioobjeto = $ver->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM usuarios where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
    }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $newpassword = password_hash($this->contrasena, PASSWORD_BCRYPT);
        $actualizar = $instanciaconexion->datos->prepare("UPDATE usuarios set nombre_usua='$this->nombre_usua', email_usua='$this->email_usua',rol='$this->rol',contrasena_usua='$newpassword' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
    }
}


?>