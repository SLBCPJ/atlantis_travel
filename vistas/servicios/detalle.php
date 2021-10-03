<?php 
require '../inc/header.php';
foreach ($objetoretornadohxs as $serv){}
    // foreach ($objetoretornadoccotixtrans as $c){}
?>
<a href="../controlador/ServicioControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>



<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <i class="fa fa-quote-left"></i> <strong class="card-title mb-3">Detalle del Servicio</strong>
    </div>
    <div class="card-body">
      <div class="mx-auto d-block">
        <div class="location text-sm-center"> <?php foreach($objetoretornadohosp as $hospedaje){?><img
            src="<?php echo $hospedaje->foto_url_hosp; ?>" class="img-thumbnail" width="200" height="100"> <?php } ?>
        </div>
        <div class="location text-sm-center"><i class=""></i> Nombre del Servicio: <?php echo $serv->nombre_serv;?>
        </div>
        <div class="location text-sm-center"><i class=""></i>Descripcion del Servicio: <?php echo $serv->descripcion_serv;?></div>
        <div class="location text-sm-center"><i class="">Servicio Adicional:</i> <?php echo $serv->servicios_adi_serv;?>
        </div>
        <div class="location text-sm-center"><i class="">Costo:</i> <?php echo "$". $serv->costo_serv;?> COP</div>
      </div>
      <hr>
      <div class="card-text text-sm-center">
        <div class="table-responsive">
          <table class="table table-hover table table-striped">
            <thead>
              <tr>
                <th>Nombre del Hospedaje</th>
                <th>Número de Estrellas</th>
                <th>Descripción</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($objetoretornadohosp as $hospedaje){?>
              <tr>
                <td><?php echo $hospedaje->nombre_hosp;?> </td>
                <td><?php echo $hospedaje->estrellas_hosp;?> </td>
                <td><?php echo $hospedaje->descripcion_hosp;?> </td>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





  <?php require '../inc/footer.php'; ?>