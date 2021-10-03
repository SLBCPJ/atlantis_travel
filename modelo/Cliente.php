<?php
class Cliente{

    public $id;
    public $tipoid;
    public $numeroid;
    public $nombre;
    public $apellido;
    public $fechanaci;
    public $telefono;
    public $celular;
    public $direcion;
    public $email;
    public $contrasena;
    public $genero;
    public $estadoci;
    function __construct(){}

    public function guardar(){
        $instanciaconexion = new Conexion();
        $newpassword = password_hash($this->contrasena, PASSWORD_BCRYPT);
        $insertar = $instanciaconexion->datos->prepare("INSERT INTO clientes (tipo_iden_clie,nume_id_clie,nomb_clie,apell_clie,fecha_naci_clie,tele_clie,celu_clie,dire_clie,email_clie,contra_clie,genero_clie,estado_civil_clie)values(?,?,?,?,?,?,?,?,?,?,?,?)");
        $insertar->bindParam(1,$this->tipoid);
        $insertar->bindParam(2,$this->numeroid); 
        $insertar->bindParam(3,$this->nombre);
        $insertar->bindParam(4,$this->apellido);
        $insertar->bindParam(5,$this->fechanaci);
        $insertar->bindParam(6,$this->telefono);
        $insertar->bindParam(7,$this->celular);
        $insertar->bindParam(8,$this->direcion);
        $insertar->bindParam(9,$this->email);
        $insertar->bindParam(10,$newpassword);
        $insertar->bindParam(11,$this->genero);
        $insertar->bindParam(12,$this->estadoci);
        $insertar->execute();
        $instanciaconexion->cerrarconexion();
        }
    public function consultar(){
        $instanciaconexion = new Conexion();
        $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM clientes");
        $datosusuario->execute();
        $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }

    public function eliminar(){
        $instanciaconexion = new Conexion();
        $elimine = $instanciaconexion->datos->prepare("DELETE FROM clientes where id='$this->id'");
        $elimine->execute();
        $instanciaconexion->cerrarconexion();
        }
    public function imprimir1(){
        $instanciaconexion = new Conexion();
        $imprime = $instanciaconexion->datos->prepare("SELECT * FROM clientes where id='$this->id'");
        $imprime->execute();
        $usuarioobjeto = $imprime->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }
        public function verperfil(){
            $instanciaconexion = new Conexion();
            $ver = $instanciaconexion->datos->prepare("SELECT * FROM clientes where id='$this->id'");
            $ver->execute();
            $usuarioobjeto = $ver->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $usuarioobjeto;
            }
    public function actualizar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM clientes where id='$this->id'");
        $actualizar->execute();
        $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $actualizarobjeto;
        }
    public function actualizarinsertar(){
        $instanciaconexion = new Conexion();
        $actualizar = $instanciaconexion->datos->prepare("UPDATE clientes set tipo_iden_clie='$this->tipoid', nume_id_clie='$this->numeroid',nomb_clie='$this->nombre', apell_clie='$this->apellido', fecha_naci_clie='$this->fechanaci',tele_clie='$this->telefono', celu_clie='$this->celular', dire_clie='$this->direcion', email_clie='$this->email', genero_clie='$this->genero',estado_civil_clie='$this->estado' where id='$this->id'");
        $actualizar->execute();
        $instanciaconexion->cerrarconexion();
        }
}