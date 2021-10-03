<?php 
class CotizacionXPaquete{

    public $id; //parametros
    public $Cotizacion_id;	
    public $Paquetes_id;


    public function __construct(){}
    public function insetartablaintermedia(){
        $instanciaconexion = new Conexion();
        for ($i=0;$i<count($this->Paquetes_id); $i++) { 
            $insertar = $instanciaconexion->datos->prepare("INSERT INTO cotizacion_has_paquetes(Cotizacion_id,Paquetes_id) values (?,?)");
            $insertar->bindParam(1, $this->Cotizacion_id);
            $insertar->bindParam(2, $this->Paquetes_id[$i]);
            $insertar->execute();
            $instanciaconexion->cerrarconexion();
        }
       
        }
        public function consultartabladetalle(){
            $instanciaconexion = new Conexion();
            $sentencia = "SELECT P.nomb_paqu, P.descripcion_paqu, P.foto_url_paqu, P.prec_paqu FROM paquetes P INNER JOIN cotizacion_has_paquetes CP ON CP.Paquetes_id = P.id INNER JOIN Cotizacion C ON CP.Cotizacion_id = C.id WHERE CP.Cotizacion_id = $this->id";
            $consultar = $instanciaconexion->datos->prepare($sentencia);
            $consultar->execute();
            $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $consultaobjeto;
        }
        public function consultartabladetalletrans(){
            $instanciaconexion = new Conexion();
            $sentencia = "SELECT T.nombre_tran, T.descripcion_tran FROM transportes T INNER JOIN cotizacion_has_transportes CT ON CT.Transportes_id = T.id INNER JOIN cotizacion C ON CT.Cotizacion_id = C.id WHERE CT.Cotizacion_id = $this->id";
            $consultar = $instanciaconexion->datos->prepare($sentencia);
            $consultar->execute();
            $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
            return $consultaobjeto;
        }
        public function consultartabladetallehosp(){
            $instanciaconexion = new Conexion();
            $sentencia =  "SELECT H.nombre_hosp, H.estrellas_hosp, H.habitaciones_hosp, H.descripcion_hosp, H.foto_url_hosp FROM hospedajes H INNER JOIN hospedajes_has_cotizacion HC ON HC.Hospedajes_id = H.id INNER JOIN cotizacion C ON HC.Cotizacion_id = C.id WHERE HC.Cotizacion_id =  $this->id";
            $consultar = $instanciaconexion->datos->prepare($sentencia);
            $consultar->execute();
            $consultaobjeto = $consultar->fetchAll(PDO::FETCH_OBJ);
            $instanciaconexion->cerrarconexion();
            return $consultaobjeto;
        }
        public function consultartabladetalleservi(){
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