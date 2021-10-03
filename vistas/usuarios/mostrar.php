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
                        <strong class="card-title">Lista de Usuarios</strong>
                    </div>
                    <div class="card-body">
                        <a href="../controlador/UsuarioControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Crear Nuevo Usuario
                            </button></a><br>
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                <thead>
                                    <tr>
                                        <th>Nombre</th>
                                        <th>Email</th>
                                        <th>Rol</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php foreach ($objetoretornado as $mostrarciclo) {?>
                                        <td><?php echo $mostrarciclo->nombre_usua; ?></td>
                                        <td><?php echo $mostrarciclo->email_usua;?></td>
                                        <td><?php echo $mostrarciclo->rol; ?></td>
                                        <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)"><i
                                                    class="ti-trash cualquiera" title="Desea eliminar el usuario" style="color:red;"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"><i
                                                    class="ti-write actualiza"></i></a>
                                          
                                            <a onclick="perfil(<?php echo $mostrarciclo->id;?>)"
                                                title="Para ver su perfil click aqui"><i class="ti-eye imprime"></i></a>
                                        </td>
                                    </tr>
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
                    var url = 'UsuarioControlador.php?accion=eliminar&id=' + idusuario;
                    location.href = url;
                } else {
                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(id) {
        var url = 'UsuarioControlador.php?accion=actualizar&id=' + id;
        location.href = url;
    }

    function perfil(id) {
        var url = 'UsuarioControlador.php?accion=perfil&id=' + id;
        location.href = url;
    }
</script>

<?php require '../inc/footer.php'; ?>