<?php 
class HospedajeXServicio{

    public $id; //parametros
    public $Hospedajes_id;	
    public $Servicios_id;


    public function __construct(){}
        public function insetartablaintermedia(){
            $instanciaconexion = new Conexion();
            for ($i=0;$i<count($this->Hospedajes_id); $i++) { 
                $insertar = $instanciaconexion->datos->prepare("INSERT INTO hospedajes_has_servicios(Hospedajes_id,Servicios_id) values (?,?)");
                $insertar->bindParam(1, $this->Hospedajes_id[$i]);
                $insertar->bindParam(2, $this->Servicios_id);
                // $insertar->bindParam(3, $this->cantidad[$i]);
                $insertar->execute();
                // $instanciaconexion->cerrarconexion();

            }
               
                }
                public function consultartabladetalle(){
                    $instanciaconexion = new Conexion();
                    $sentencia = "SELECT H.nombre_hosp, H.estrellas_hosp, H.habitaciones_hosp, H.descripcion_hosp, H.foto_url_hosp FROM hospedajes H INNER JOIN hospedajes_has_servicios HS ON HS.Hospedajes_id = H.id INNER JOIN servicios S ON HS.Servicios_id = S.id WHERE HS.Servicios_id = $this->id";
                    $consultar = $instanciaconexion->datos->prepare($sentencia);
                    $consultar->execute();
                    $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
                    $instanciaconexion->cerrarconexion();
                    return $consultaobjeto;
                }
        }
 
?>

