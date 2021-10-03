
<?php 
require '../inc/header.php';

foreach ($perfil as $perfil){}

?>


<a href="../controlador/ClienteControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm" >
    <i class="ti-arrow-circle-left"></i> Regresar
</button></a><br> <br>

<div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <i class="fa fa-user"></i><strong class="card-title pl-2">Información del cliente</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <!-- <img class="rounded-circle mx-auto d-block" src="images/admin.jpg" alt="Card image cap"> -->
                                    <h5 class="text-sm-center mt-2 mb-1"><?php echo $perfil->nomb_clie . " " . $perfil->apell_clie;?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-id-card-o"></i> <?php echo $perfil->tipo_iden_clie . " " . $perfil->nume_id_clie;?></div>
                                    <div class="location text-sm-center"><i class="fa fa-calendar"></i> <?php echo $perfil->fecha_naci_clie;?></div>
                                    <div class="location text-sm-center"><i class="fa fa-telephone"></i>Telefono: <?php echo $perfil->tele_clie;?></div>
                                    <div class="location text-sm-center"><i class=""></i>Celular: <?php echo $perfil->celu_clie;?></div>
                                    <div class="location text-sm-center"><i class=""></i>Estado Civil: <?php echo $perfil->estado_civil_clie;?></div>
                                </div> 
                                <hr>
                                <div class="card-text text-sm-center">
                                    <i class="ti-location-pin"></i> <?php echo $perfil->dire_clie;?> </i>
                                    <div class="location text-sm-center"><i class="ti-email"></i> <?php echo $perfil->email_clie;?></div>
                            
                                </div>
                            </div>
                        </div>
                    </div>




<?php require '../inc/footer.php'; ?>