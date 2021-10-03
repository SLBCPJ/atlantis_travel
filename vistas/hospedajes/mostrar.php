<?php 
require '../inc/header.php';
// if(empty($_SESSION['email']) && $_SESSION['rol']=="Administrador" || $_SESSION['rol']=="Cliente") {
//     // header("location: ../usuarios/login.php");
//  }
?>
<?php //if(isset($_SESSION['rol'])&&$_SESSION['rol']=="Cliente"  || $_SESSION['rol']=="Administrador") { ?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lista de Hospedajes</strong>
                    </div>
                    <div class="card-body">
                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                        <a href="../controlador/HospedajeControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                        <?php } ?>
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>N° de Estrellas</th>
                                        <th>Habitaciones</th>
                                        <!-- <th>Foto</th> -->
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($retornado as $mostrarciclo) {?>
                                        <td><?php echo $mostrarciclo->nombre_hosp; ?></td>
                                        <td><?php echo $mostrarciclo->estrellas_hosp;?></td>
                                        <td><?php echo $mostrarciclo->habitaciones_hosp; ?></td>

                                        <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>,'<?php echo $mostrarciclo->foto_url_hosp; ?>')"
                                                title="Para eliminar click aqui"><i class="ti-trash cualquiera"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"
                                                title="Para actualizar click aqui"><i
                                                    class="ti-pencil-alt actualiza"></i></a>
                                            <a onclick="detahosp(<?php echo $mostrarciclo->id;?>)"
                                                title="Para ver detalladamente el hospedaje click aqui"><i
                                                    class="ti-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                    <?php foreach ($retornado as $mostrarciclo) {?>
                                    <td><?php echo $mostrarciclo->nombre_hosp; ?></td>
                                    <td><?php echo $mostrarciclo->estrellas_hosp;?></td>
                                    <td><?php echo $mostrarciclo->habitaciones_hosp; ?></td>

                                    <td>

                                        <a onclick="detahosp(<?php echo $mostrarciclo->id;?>)"
                                            title="Para ver detalladamente el hospedaje click aqui"><i
                                                class="ti-eye"></i></a>
                                    </td>
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
    // .popup({
    //     position : 'right center',
    //     title : '¿Desea Eliminar?',
    //     content : 'Para borrar click aqui'
    // });
    // $('.actualiza')
    // .popup({
    //     position : 'right center',
    //     title : '¿Desea Actualizar?',
    //     content : 'Para actualizar click aqui'
    // });
    // $('.imprime')
    // .popup({
    //     position : 'right center',
    //     title : '¿Desea Imprimir?',
    //     content : 'Para imprimir click aqui'
    // });
    function eliminar(idusuario, foto_url_hosp) {
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

                    var url = 'HospedajeControlador.php?accion=eliminar&id=' + idusuario + '&foto_url_hosp=' + foto_url_hosp;
                    location.href = url;
                } else {
                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(id) {
        var url = 'HospedajeControlador.php?accion=actualizar&id=' + id;
        location.href = url;
    }
    // function imprimir(id){
    //     var url = 'HospedajeControlador.php?accion=imprimir&id=' + id;
    //     location.href = url;
    // }
    function detahosp(id) {
        var url = 'HospedajeControlador.php?accion=detahosp&id=' + id;
        location.href = url;
    }
</script>

<?php require '../inc/footer.php'; ?>