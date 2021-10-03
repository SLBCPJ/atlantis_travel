<?php 
require '../inc/header.php';

foreach ($objetoretornadoccotixpaqu as $coti){}

?>


<a href="../controlador/CotizacionControl.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
        <i class="ti-arrow-circle-left"></i> Regresar
    </button></a>



<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-quote-left"></i> <strong class="card-title mb-3">Detalle de la cotizacion </strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <div class="location text-sm-center"> <?php foreach($objetoretornadopaquete as $paquete){?><img
                        src="<?php echo $paquete->foto_url_paqu; ?>" class="img-thumbnail" width="100" height="50">
                    <?php } ?> </div>
                <div class="location text-sm-center"><i class="ti-calendar"></i> Fecha de Salida:
                    <?php echo $coti->fecha_salida_coti;?> </div>
                <div class="location text-sm-center"><i class="ti-calendar"></i> Fecha de Llegada:
                    <?php echo $coti->fecha_llegada_coti;?> </div>
                <div class="location text-sm-center"><i class="">Adultos:</i> <?php echo $coti->adultos_coti;?></div>
                <div class="location text-sm-center"><i class="">Menores:</i> <?php echo $coti->menores_coti;?></div>
                <div class="location text-sm-center"><i class="">Precio de la Cotizacion:</i>
                    <?php echo $coti->precio_coti;?></div>
            </div>
            <hr>
            <div class="card-text text-sm-center">
                <?php foreach($objetoretornadopaquete as $paquete){?><?php echo $paquete->nomb_paqu;?> <?php } ?><br>
                <?php foreach($objetoretornadopaquete as $paquete){?><?php echo $paquete->descripcion_paqu;?> <?php } ?>
                <br>
                <?php foreach($objetoretornadopaquete as $paquete){?><?php echo $paquete->prec_paqu;?> <?php } ?><br>
                <?php foreach($objetoretornadotrans as $transportes){?><?php echo $transportes->nombre_tran;?>
                <?php } ?>
                <?php foreach($objetoretornadohosp as $hospedajes){?><?php echo $hospedajes->nombre_hosp;?>
                <?php } ?><br>
                <?php foreach($objetoretornadoccotixservi as $servicios){?><?php echo $servicios->nombre_serv;?><br><br>
                    <a class="btn btn-warning" href="https://api.whatsapp.com/send?phone=573167800507&text=Hola Quiero Información Sobre Esta Cotización><?php echo $paquete->nomb_paqu;?><">SEPARAR</a>
                <?php } ?>
            </div>
            
        </div>
    </div>
</div>



<?php require '../inc/footer.php'; ?>