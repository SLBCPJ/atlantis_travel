<?php 
require '../inc/header.php';
foreach ($objetoretornadopxs as $paque){}
    // foreach ($objetoretornadoccotixtrans as $c){}
?>
<a href="../controlador/PaqueteControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>



<div class="col-md-12">
  <div class="card">
    <div class="card-header">
      <i class="fa fa-quote-left"></i> <strong class="card-title mb-3">Detalle del Servicio</strong>
    </div>
    <div class="card-body">
      <div class="mx-auto d-block">
        <div class="location text-sm-center"> <img
            src="<?php echo $paque->foto_url_paqu; ?>" class="img-thumbnail" width="200" height="100">
        </div>
        <div class="location text-sm-center"><i class=""></i> Nombre del Paquete: <?php echo $paque->nomb_paqu;?>
        </div>
        <div class="location text-sm-center"><i class=""></i>Descripcion del Paquete: <?php echo $paque->descripcion_paqu;?></div>
        <div class="location text-sm-center"><i class="">Obsequio:</i> <?php echo $paque->obsequio_paqu;?>
        </div>
        <div class="location text-sm-center"><i class="">Costo:</i> <?php echo "$". $paque->prec_paqu;?></div>
      </div>
      <hr>
      <div class="card-text text-sm-center">
        <div class="table-responsive">
          <table class="table table-hover table table-striped">
            <thead>
              <tr>
                <th>Nombre del Servicio</th>
                <th>Descripcion</th>
                <th>Servicio adicional</th>
                <th>Costo</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach($objetoretornadoservi as $servicio){?>
              <tr>
                <td><?php echo $servicio->nombre_serv;?> </td>
                <td><?php echo $servicio->descripcion_serv;?> </td>
                <td><?php echo $servicio->servicios_adi_serv;?> </td>
                <td><?php echo $servicio->costo_serv;?> </td>
                <?php } ?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>





  <?php require '../inc/footer.php'; ?>