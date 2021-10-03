<?php 
class ServicioXCotizacion{

    public $id; //parametros
    public $Servicios_id;	
    public $Cotizacion_id;


    public function __construct(){}
        public function insetartablaintermedia(){
            $instanciaconexion = new Conexion();
            for ($i=0;$i<count($this->Servicios_id); $i++) { 
                $insertar = $instanciaconexion->datos->prepare("INSERT INTO servicios_has_cotizacion(Servicios_id,Cotizacion_id) values (?,?)");
                $insertar->bindParam(1, $this->Servicios_id[$i]);
                $insertar->bindParam(2, $this->Cotizacion_id);
                // $insertar->bindParam(3, $this->cantidad[$i]);
                $insertar->execute();
                $instanciaconexion->cerrarconexion();
                // echo "El valor a registrar del id es " .$this->cliente_id[$i];
                // echo "Mirar si se inserto en la base de datos";

            }
               
                }
                public function consultartabladetalle(){
                    $instanciaconexion = new Conexion();
                    $sentencia = "SELECT S.nombre_serv, S.descripcion_serv,S.servicios_adi_serv, S.costo_serv FROM servicios S INNER JOIN servicios_has_cotizacion CS ON CS.Servicios_id	 = S.id INNER JOIN Cotizacion C ON CS.Cotizacion_id = C.id WHERE CS.Cotizacion_id = $this->id";
                    $consultar = $instanciaconexion->datos->prepare($sentencia);
                    $consultar->execute();
                    $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
                    $instanciaconexion->cerrarconexion();
                    return $consultaobjeto;
                }
        }
        

?>

