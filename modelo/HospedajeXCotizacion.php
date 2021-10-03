<?php 
class HospedajeXCotizacion{

    public $id; //parametros
    public $Hospedajes_id;	
    public $Cotizacion_id;

        public function __construct(){}
        public function insetartablaintermedia(){
            $instanciaconexion = new Conexion();
            for ($i=0;$i<count($this->Hospedajes_id); $i++) { 
                $insertar = $instanciaconexion->datos->prepare("INSERT INTO hospedajes_has_cotizacion(Hospedajes_id,Cotizacion_id) values (?,?)");
                $insertar->bindParam(1, $this->Hospedajes_id[$i]);
                $insertar->bindParam(2, $this->Cotizacion_id);
                // $insertar->bindParam(3, $this->cantidad[$i]);
                $insertar->execute();
                $instanciaconexion->cerrarconexion();
            

            }
               
                }
                public function consultartabladetalle(){
                    $instanciaconexion = new Conexion();
                    $sentencia = "SELECT H.nombre_hosp, H.estrellas_hosp, H.habitaciones_hosp, H.descripcion_hosp, H.foto_url_hosp FROM hospedajes H INNER JOIN hospedajes_has_cotizacion HC ON HC.Hospedajes_id = H.id INNER JOIN cotizacion C ON HC.Cotizacion_id = C.id WHERE HC.Cotizacion_id =  $this->id";
                    $consultar = $instanciaconexion->datos->prepare($sentencia);
                    $consultar->execute();
                    $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
                    $instanciaconexion->cerrarconexion();
                    return $consultaobjeto;
                }
        }
        
        ?>
