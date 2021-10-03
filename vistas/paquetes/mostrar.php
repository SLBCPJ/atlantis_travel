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
                                <strong class="card-title">Listado de Paquetes Turisticos</strong>
                            </div>
                            <div class="card-body">
                            <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                            <a href="../controlador/PaqueteControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                            <?php } ?>
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                    <thead>
                                        <tr>
                                        <th>Nombre</th>
                                        <th>Descripcion</th>
                                        <th>Precio del Paquete</th>
                                      
                                        <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                            <td><?php echo $mostrarciclo->nomb_paqu; ?></td>
                                            <td><?php echo $mostrarciclo->descripcion_paqu; ?></td>
                                            <td><?php echo $mostrarciclo->prec_paqu; ?></td>
                                          <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>,'<?php echo $mostrarciclo->foto_url_paqu; ?>')"   title="Para eliminar click"><i class="ti-trash cualquiera"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)" title="Para actualizar click"><i class="ti-pencil-alt actualiza"></i></a>
                                            <a onclick="detahosp(<?php echo $mostrarciclo->id;?>)"
                                                title="Para ver mas detalle del Paquete Turistico click aqui"><i class="ti-eye imprime"></i></a>
                                                <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)" title="Detalle "><i class="ti-eye ver"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                            <td><?php echo $mostrarciclo->nomb_paqu; ?></td>
                                            <td><?php echo $mostrarciclo->descripcion_paqu; ?></td>
                                            <td><?php echo $mostrarciclo->prec_paqu; ?></td>
                                            <td>
                                            <a onclick="detahosp(<?php echo $mostrarciclo->id;?>)"
                                                title="Para ver mas detalle del Paquete Turistico click aqui"><i class="ti-eye"></i></a>
                                                <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)" title="Más Detalles"><i class="fa fa-plus-square"></i></a>
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
   
   function eliminar(idusuario,foto_url_paqu){
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
            var url = 'PaqueteControlador.php?accion=eliminar&id=' + idusuario + '&foto_url_paqu=' + foto_url_paqu;
            location.href = url;
        } else {
            swal("¡No se ha eliminado el registro!", {
        icon: "error",
        });

        }
        });
        }
        function actualizar(id){
            var url = 'PaqueteControlador.php?accion=actualizar&id=' + id;
            location.href = url;
        }
   
        function detahosp(id){
            var url = 'PaqueteControlador.php?accion=detahosp&id=' + id;
            location.href = url;
        }
        function detalle(id){
            var url = 'PaqueteXServicioControlador.php?accion=detalle&id=' + id;
            location.href = url;
        }
</script>

<?php require '../inc/footer.php'; ?>