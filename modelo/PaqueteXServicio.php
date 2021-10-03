<?php 
class PaqueteXServicio{

    public $id; //parametros
    public $Paquetes_id;	
    public $Servicios_id;


    public function __construct(){}
        public function insetartablaintermedia(){
            $instanciaconexion = new Conexion();
            for ($i=0;$i<count($this->Servicios_id); $i++) { 
                $insertar = $instanciaconexion->datos->prepare("INSERT INTO paquetes_has_servicios(Paquetes_id,Servicios_id) values (?,?)");
                $insertar->bindParam(1, $this->Paquetes_id);
                $insertar->bindParam(2, $this->Servicios_id[$i]);
                // $insertar->bindParam(3, $this->cantidad[$i]);
                $insertar->execute();
                // $instanciaconexion->cerrarconexion();
                // echo "El valor a registrar del id es " .$this->cliente_id[$i];
                // echo "Mirar si se inserto en la base de datos";

            }
               
                }
                //pendiente por hacer
                public function consultartabladetalle(){
                    $instanciaconexion = new Conexion();
                    $sentencia = "SELECT S.nombre_serv, S.descripcion_serv, S.servicios_adi_serv, S.costo_serv FROM servicios S INNER JOIN paquetes_has_servicios PS ON PS.Servicios_id = S.id INNER JOIN paquetes P ON PS.Paquetes_id = P.id WHERE PS.Paquetes_id = $this->id";
                    $consultar = $instanciaconexion->datos->prepare($sentencia);
                    $consultar->execute();
                    $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
                    $instanciaconexion->cerrarconexion();
                    return $consultaobjeto;
                }
        }
        

?>

