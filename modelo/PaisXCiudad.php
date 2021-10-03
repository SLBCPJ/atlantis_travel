<?php 
class PaisXCiudad{

    public $id; //parametros
    public $Paises_id;
    public $Ciudades_id;


    public function __construct(){}
    public function insetartablaintermedia(){
        $instanciaconexion = new Conexion();
        for ($i=0;$i<count($this->Hospedajes_id); $i++) { 
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO paises_has_ciudades(Ciudades_id,Paises_id) values (?,?)");
            $insertar->bindParam(1, $this->Ciudades_id);
            $insertar->bindParam(2, $this->Paises_id[$i]);
            $insertar->execute();
            // echo "El valor a registrar del id es " .$this->cliente_id[$i];
           
       
        }
        }
        public function consultartabladetalle(){
            $instanciaconexion = new Conexion();
            $sentencia = "SELECT P.nombre_pais, P.descripcion_pais FROM paises P INNER JOIN paises_has_ciudades PC ON PC.Paises_id = P.id INNER JOIN ciudades C ON PC.Ciudades_id = C.id WHERE PC.Ciudades_id =  $this->id";
            $consultar = $instanciaconexion->datos->prepare($sentencia);
            $consultar->execute();
            $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
            // $instanciaconexion->cerrarconexion();
            return $consultaobjeto;
        }
}

?>