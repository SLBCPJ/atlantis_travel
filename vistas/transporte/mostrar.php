<?php 
require '../inc/header.php';
if(empty($_SESSION['email']) && $_SESSION['rol']=="Administrador" || $_SESSION['rol']=="Cliente") {
    // header("location: ../usuarios/login.php");
 }
?>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lista de Transportes</strong>
                    </div>
                    <div class="card-body">
                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                        <a href="../controlador/TransporteControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                        <?php } ?>
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre del Transporte</th>
                                        <th>Descripcion</th>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <th>Acciones</th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                        <td><?php echo $mostrarciclo->nombre_tran; ?></td>
                                        <td><?php echo $mostrarciclo->descripcion_tran; ?></td>
                                        <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)"><i
                                                    class="ti-trash cualquiera" title="Desea Eliminar?"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"><i
                                                    class="ti-pencil-alt actualiza"></i></a>

                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                    <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                    <td><?php echo $mostrarciclo->nombre_tran; ?></td>
                                    <td><?php echo $mostrarciclo->descripcion_tran; ?></td>

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


    // $('.cualquiera')
    //     .popup({
    //         position: 'right center',
    //         title: '¿Desea Eliminar?',
    //         content: 'Para borrar click aqui'
    //     });
    // $('.actualiza')
    //     .popup({
    //         position: 'right center',
    //         title: '¿Desea Actualizar?',
    //         content: 'Para actualizar click aqui'
    //     });
    // $('.imprime')
    //     .popup({
    //         position: 'right center',
    //         title: '¿Desea Imprimir?',
    //         content: 'Para imprimir click aqui'
    //     });
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
                    var url = 'TransporteControlador.php?accion=eliminar&id=' + idusuario;
                    location.href = url;
                } else {
                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(id) {
        var url = 'TransporteControlador.php?accion=actualizar&id=' + id;
        location.href = url;
    }
    // function imprimir(id) {
    //     var url = 'TransporteControlador.php?accion=imprimir&id=' + id;
    //     location.href = url;
    // }
</script>

<?php require '../inc/footer.php'; ?>