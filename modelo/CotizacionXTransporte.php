<?php 
class CotizacionXTransporte{
    
        public $id; //parametros
        public $Cotizacion_id;	
        public $Transportes_id;
    
    
        public function __construct(){}
        public function insetartablaintermedia(){
            $instanciaconexion = new Conexion();
            for ($i=0;$i<count($this->Transportes_id); $i++) { 
                $insertar = $instanciaconexion->datos->prepare("INSERT INTO cotizacion_has_transportes(Cotizacion_id,Transportes_id) values (?,?)");
                $insertar->bindParam(1, $this->Cotizacion_id);
                $insertar->bindParam(2, $this->Transportes_id[$i]);
                // $insertar->bindParam(3, $this->cantidad[$i]);
                $insertar->execute();
                $instanciaconexion->cerrarconexion();

            }
           
            }
            public function consultartabladetalle(){
                $instanciaconexion = new Conexion();
                $sentencia = "SELECT T.nombre_tran, T.descripcion_tran FROM transportes T INNER JOIN cotizacion_has_transportes CT ON CT.Transportes_id = T.id INNER JOIN cotizacion C ON CT.Cotizacion_id = C.id WHERE CT.Cotizacion_id = $this->id";
                $consultar = $instanciaconexion->datos->prepare($sentencia);
                $consultar->execute();
                $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
                $instanciaconexion->cerrarconexion();
                return $consultaobjeto;
            }
    }
    
    ?>