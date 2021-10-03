
<?php 
require '../inc/header.php';

foreach ($detalleservicio as $perfil){}

?>


<a href="../controlador/ServicioControlador.php?accion=inicio"> <button type="submit" class="btn btn-primary btn-sm" >
    <i class="ti-arrow-circle-left"></i> Regresar
</button></a><br>



<div class="col-md-12" >
                        <div class="card">
                            <div class="card-header">
                            <i class="fa fa-sun-o"></i> <strong class="card-title mb-3">Información del Servicio</strong>
                            </div>
                            <div class="card-body" >
                                <div class="mx-auto d-block">
                                  
                                    <div class="text-sm-center mt-2 mb-1"><h3><strong>Nombre:</strong> <?php echo $perfil->nombre_serv;?></h3> </div>
                                    <div class="location text-sm-center"><strong>Descripción:</strong> <?php echo $perfil->descripcion_serv;?></div>
                                    <div class="location text-sm-center"><strong>Servicio Adicional:</strong> <?php echo $perfil->servicios_adi_serv;?></div>
                                    
                                </div>
                                <hr>
                                <div class="card-text text-sm-center">
                                <strong>Costo:</strong><i class=""> $<?php echo $perfil->costo_serv;?> COP</i>
                           
                                </div>
                                <a class="btn btn-warning" href="https://api.whatsapp.com/send?phone=573167800507&text=Hola Quiero Información Sobre Este Servicio><?php echo $perfil->nombre_serv;?><">SEPARAR</a>
                            </div>
                        </div>
                    </div>
        




<?php require '../inc/footer.php'; ?>