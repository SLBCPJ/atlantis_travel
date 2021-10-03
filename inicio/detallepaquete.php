<?php 
require '../inc/header.php';

foreach ($detallepaquete as $perfil){}

?>


<a href="../controlador/PaqueteControlador.php?accion=inicio"> <button type="submit" class="btn btn-primary btn-sm">
        <i class="ti-arrow-circle-left"></i> Regresar
    </button></a><br>


<div class="col-md-12">
    <div class="card">
        <div class="card-header">
            <i class="fa fa-sun-o"></i> <strong class="card-title mb-3">Información del Paquete Turistico</strong>
        </div>
        <div class="card-body">
            <div class="mx-auto d-block">
                <img class="card mx-auto d-block" width="350" height="200" src="<?php echo $perfil->foto_url_paqu; ?>"
                    alt="Card image cap">
                <h5 class="text-sm-center mt-2 mb-1"><?php echo $perfil->nomb_paqu;?></h5>
                <div class="location text-sm-center"><strong>Obsequio:</strong> <?php echo $perfil->obsequio_paqu;?>
                </div>
                <div class="location text-sm-center"><strong>Tour:</strong> <?php echo $perfil->tour_paqu;?></div>
                <div class="location text-sm-center"><strong>Descripcion:</strong>
                    <?php echo $perfil->descripcion_paqu;?></div>
            </div>
            <hr>
            <div class="card-text text-sm-center">
                <i class=""> $<?php echo $perfil->prec_paqu;?> COP</i>

            </div>
           
            <a class="btn btn-warning" href="https://api.whatsapp.com/send?phone=573167800507&text=Hola Quiero Información Sobre Este Paquete><?php echo $perfil->nomb_paqu;?><">SEPARAR</a>  
        </div>
    </div>
</div>





<?php require '../inc/footer.php'; ?>