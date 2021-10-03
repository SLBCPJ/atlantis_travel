<?php
class Cotizacion{

    public $id;
    public $fecha_salida;
    public $fecha_llegada;
    public $adultos;
    public $menores;
    public $precio;
    public $Clientes_id;
    public $Ciudades_id;

    function __construct(){}
    public function consultarultimo(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from cotizacion"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }
    public function consultarultimotransporte(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from cotizacion"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }
    public function consultarultimoservicio(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from cotizacion"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }
    public function consultarultimohospedaje(){
        $instanciaconexion = new Conexion();
        $consulta = $instanciaconexion->datos->prepare("SELECT max(id) from cotizacion"); //max es para traer el ultimo numero
        $consulta->execute();
        return $consulta->fetch(); //fetch es para un arreglo
    }
  
    public function insertar(){
    $instanciaconexion = new Conexion();
    $insertar = $instanciaconexion->datos->prepare("INSERT INTO cotizacion (fecha_salida_coti,fecha_llegada_coti,adultos_coti,menores_coti,precio_coti,Clientes_id,Ciudades_id)values(?,?,?,?,?,?,?)");
    $insertar->bindParam(1,$this->fecha_salida);
    $insertar->bindParam(2,$this->fecha_llegada);
    $insertar->bindParam(3,$this->adultos);
    $insertar->bindParam(4,$this->menores);
    $insertar->bindParam(5,$this->precio);
    $insertar->bindParam(6,$this->Clientes_id);
    $insertar->bindParam(7,$this->Ciudades_id);
    $insertar->execute();
    $instanciaconexion->cerrarconexion();
    }
    public function mostrar(){
    $instanciaconexion = new Conexion();
    $datospaquete = $instanciaconexion->datos->prepare("SELECT * FROM cotizacion");
    $datospaquete->execute();
    $usuarioobjeto = $datospaquete->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $usuarioobjeto;
    }
    // public function imprimir1(){
    // $instanciaconexion = new Conexion();
    // $imprime = $instanciaconexion->datos->prepare("SELECT * FROM cotizacion where id='$this->id'");
    // $imprime->execute();
    // $usuarioobjeto = $imprime->fetchAll(PDO::FETCH_OBJ);
    // $instanciaconexion->cerrarconexion();
    // return $usuarioobjeto;
    // }
    public function mostrarclientes(){
    $instanciaconexion = new Conexion();
    $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM clientes");
    $datosusuario->execute();
    $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
    return $usuarioobjeto;
    }
    public function mostrarciudades(){
    $instanciaconexion = new Conexion();
    $datosusuario = $instanciaconexion->datos->prepare("SELECT * FROM ciudades");
    $datosusuario->execute();
    $usuarioobjeto = $datosusuario->fetchAll(PDO::FETCH_OBJ);
    return $usuarioobjeto;
    }
    public function mostrarpaquetes(){
    $instanciaconexion = new Conexion();
    $datos = $instanciaconexion->datos->prepare("SELECT * FROM paquetes");
    $datos->execute();
    $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
    return $objeto;
    }
    public function mostrarservicios(){
    $instanciaconexion = new Conexion();
    $datos = $instanciaconexion->datos->prepare("SELECT * FROM servicios");
    $datos->execute();
    $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
    return $objeto;
    }
    public function mostrarhospedajes(){
    $instanciaconexion = new Conexion();
    $datos = $instanciaconexion->datos->prepare("SELECT * FROM hospedajes");
    $datos->execute();
    $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
    return $objeto;
    }
    public function mostrartransportes(){
    $instanciaconexion = new Conexion();
    $datos = $instanciaconexion->datos->prepare("SELECT * FROM transportes");
    $datos->execute();
    $objeto = $datos->fetchAll(PDO::FETCH_OBJ);
    return $objeto;
    }
    public function imprimircoti(){
        $instanciaconexion = new Conexion();
        $imprime = $instanciaconexion->datos->prepare("SELECT * FROM cotizacion where id='$this->id'");
        $imprime->execute();
        $usuarioobjeto = $imprime->fetchAll(PDO::FETCH_OBJ);
        $instanciaconexion->cerrarconexion();
        return $usuarioobjeto;
        }

    public function eliminar(){
    $instanciaconexion = new Conexion();
    $elimine = $instanciaconexion->datos->prepare("DELETE FROM cotizacion where id='$this->id'");
    $elimine->execute();
    $instanciaconexion->cerrarconexion();
    }
    public function actualizar(){
    $instanciaconexion = new Conexion();
    $actualizar = $instanciaconexion->datos->prepare("SELECT * FROM cotizacion where id='$this->id'");
    $actualizar->execute();
    $actualizarobjeto = $actualizar->fetchAll(PDO::FETCH_OBJ);
    $instanciaconexion->cerrarconexion();
    return $actualizarobjeto;
    }
    public function actualizarinsertar(){
    $instanciaconexion = new Conexion();
    $actualizar = $instanciaconexion->datos->prepare("UPDATE cotizacion set fecha_salida_coti='$this->fecha_salida',fecha_llegada_coti='$this->fecha_llegada',adultos_coti='$this->adultos',menores_coti='$this->menores',precio_coti='$this->precio',Clientes_id='$this->Clientes_id',Ciudades_id='$this->Ciudades_id' where id='$this->id'");
    $actualizar->execute();
    $instanciaconexion->cerrarconexion();
    }
}





?>