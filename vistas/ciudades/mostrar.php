<?php 
require '../inc/header.php';
// if(empty($_SESSION['email']) && $_SESSION['rol']=="Administrador" || $_SESSION['rol']=="Cliente") {
//     // header("location: ../usuarios/login.php");
//  }
?>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lista de Ciudades</strong>
                    </div>
                    <div class="card-body">
                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                        <a href="../controlador/CiudadControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                    <?php } ?>
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                <thead>
                                    <tr class="">
                                        <th>Codigo</th>
                                        <th>Nombre de la Ciudad</th>
                                        <th>Descripcion de la Ciudad</th>
                                        <th>Pais</th>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <th>Acciones</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                        <td><?php echo $mostrarciclo->id; ?></td>
                                        <td><?php echo $mostrarciclo->nombre_ciud; ?></td>
                                        <td><?php echo $mostrarciclo->descripcion_ciud; ?></td>
                                        <td><?php foreach ($pais as $infopais ){
                                                if($infopais->id == $mostrarciclo->Paises_id)
                                                echo $infopais->nombre_pais;} ?></td>
                                        <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)"
                                                title="Para eliminar click"><i class="ti-trash cualquiera"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"
                                                title="Para actualizar click"><i
                                                    class="ti-pencil-alt actualiza"></i></a>
                                            
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                        <td><?php echo $mostrarciclo->id; ?></td>
                                        <td><?php echo $mostrarciclo->nombre_ciud; ?></td>
                                        <td><?php echo $mostrarciclo->descripcion_ciud; ?></td>
                                        <td><?php foreach ($pais as $infopais ){
                                                if($infopais->id == $mostrarciclo->Paises_id)
                                                echo $infopais->nombre_pais;} ?></td>
                
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>


        </div>
    </div><!-- .animated -->
</div><!-- .content -->
<script>

    function eliminar(idusuario) {
        swal({
            title: "¿Está seguro?",
            text: "Su registro se va a eliminar en este momento!",
            icon: "warning",
            buttons: ["Cancelar", true],
            dangerMode: true,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("Su registro se a borrado con exito!", {
                        icon: "success",
                    });
                    var url = 'CiudadControlador.php?accion=eliminar&id=' + idusuario;
                    location.href = url;
                } else {
                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(id) {
        var url = 'CiudadControlador.php?accion=actualizar&id=' + id;
        location.href = url;
    }
  
</script>

<?php require '../inc/footer.php'; ?>