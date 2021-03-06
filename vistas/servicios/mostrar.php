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
                                <strong class="card-title">Lista de Servicios</strong>
                            </div>
                            <div class="card-body">
                            <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                            <a href="../controlador/ServicioControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                            <?php } ?>
                            <div class="table-responsive">
                                <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                    <thead>
                                        <tr>
                                        <th>Nombre del Servicio</th>
                                        <th>Descripcion</th>
                                        <th>Costo</th>
                                        <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                            <td><?php echo $mostrarciclo->nombre_serv; ?></td>
                                            <td><?php echo $mostrarciclo->descripcion_serv; ?></td>
                                            <td><?php echo $mostrarciclo->costo_serv; ?></td>
                                            <td><a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)" title="Para eliminar click"><i class="ti-trash cualquiera"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)" title="Para actualizar click"><i class="ti-pencil-alt actualiza"></i></a>
                                            <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"><i class="ti-eye ver"></i></a>
                                            </td>
                                        </tr>
                                        <?php } ?>
                                        <?php } ?>
                                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                            <td><?php echo $mostrarciclo->nombre_serv; ?></td>
                                            <td><?php echo $mostrarciclo->descripcion_serv; ?></td>
                                            <td><?php echo $mostrarciclo->costo_serv; ?></td>
                                            <td>
                                            <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"><i class="ti-eye ver"></i></a>
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
$('.cualquiera')
.popup({
    position : 'right center',
    title : '??Desea Eliminar?',
    content : 'Para borrar click aqui'
});
$('.actualiza')
.popup({
    position : 'right center',
    title : '??Desea Actualizar?',
    content : 'Para actualizar click aqui'
});
$('.ver')
.popup({
    position : 'right center',
    title : '??Desea ver el detalle?',
    content : 'Para ver click aqui'
});

   function eliminar(idusuario){
        swal({
        title: "??Est?? seguro?",
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
            var url = 'ServicioControlador.php?accion=eliminar&id=' + idusuario;
            location.href = url;
        } else {
            swal("??No se ha eliminado el registro!", {
        icon: "error",
        });

        }
        });
        }
        function actualizar(idactualizar){
            var url = 'ServicioControlador.php?accion=actualizar&id=' + idactualizar;
            location.href = url;
        }
        function modaldetalle(id){
            var url = 'HospedajeXServicioControlador.php?accion=detalle&id=' + id;
            $('.content').load(url, function (){
                $('.ui.modal').modal('show');
            });
           
        }
        function detalle(id){
            var url = 'HospedajeXServicioControlador.php?accion=detalle&id=' + id;
            location.href = url;
        }
        function imprimir(id){
            var url = 'ServicioControlador.php?accion=imprimir&id=' + id;
            location.href = url;
        }
</script>

<?php require '../inc/footer.php'; ?>