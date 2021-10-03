
<?php 
require '../inc/header.php';

foreach ($perfil as $perfil){}

?>


<a href="../controlador/UsuarioControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm" >
    <i class="ti-arrow-circle-left"></i> Regresar
</button></a>

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


<div class="content mt-3">
  <h2 class="menu-title" style="text-align: center">Informacion del Usuario</h2><br>


  <div class="card-body card-block">
    
     
        <h4>Nombre: <?php echo $perfil->nombre_usua;?> </h4><br>
 
      
        <h4>Email: <?php echo $perfil->email_usua;?> </h4><br>

        <h4>Rol: <?php echo $perfil->rol;?> </h4><br>

        <!-- <h4>Apellido: <?php echo $perfil->apell_clie;?> </h4><br>

        <h4>Fecha de Nacimiento: <?php echo $perfil->fecha_naci_clie;?> </h4><br> -->


  </div>
</div>

<?php require '../inc/footer.php'; ?>