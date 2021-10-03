<?php 
require '../inc/header.php';

foreach ($perfil as $perfil){}

?>


<a href="../controlador/HospedajeControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>

<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div> -->

<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <i class="fa fa-building-o"></i> <strong class="card-title mb-3">Información del Hospedaje</strong>
    </div>
    <div class="card-body">
      <div class="mx-auto d-block">
   
        <img class="card mx-auto d-block" style="width:100px; height:100px;"
          src="<?php echo $perfil->foto_url_hosp; ?>" alt="Card image cap">
    
        <h5 class="text-sm-center mt-2 mb-1"><?php echo $perfil->nombre_hosp;?></h5>
        <div class="location text-sm-center"> <?php echo $perfil->estrellas_hosp;?> <i class="ti-star"></i></div>
        <div class="location text-sm-center">
          <H4>Descripcion:</H4> <?php echo $perfil->descripcion_hosp;?>
        </div>
      </div>
      <hr>
      <div class="card-text text-sm-center">
        <i class="fa fa-wifi pr-1"> <?php echo $perfil->wifi_hosp;?></i>
        <h6>Aire Acondicionado: <?php echo $perfil->aire_acondicionado_hosp;?></h6>
        <h6>Piscina: <?php echo $perfil->piscina_hosp;?></h6>
        <h6>Parqueadero: <?php echo $perfil->parqueadero_hosp;?> </h6>
      </div>
    </div>
  </div>
</div>





<?php require '../inc/footer.php'; ?>