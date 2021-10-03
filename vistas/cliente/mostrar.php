<?php 
require '../inc/header.php';
// error_reporting(0);
// $varsesion = $_SESSION['rol'];
// if ($varsesion == null || $varsesion = '') {
//     echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Usted no ha iniciado una sesión o no cuenta con los privilegios adecuados para realizar esta acción.</h2></div> </div></div></body> ' ; 
//     die();
// }
if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){
    // header("location: ../usuarios/login.php");
 }
?>

<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Listado de Clientes</strong>
                    </div>
                    <div class="card-body">
                       <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                        <a href="../controlador/ClienteControlador.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                              <?php } ?>
                        <div class="table-responsive">
                            <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                                <thead>
                                    <tr>
                                       
                                       
                                        <th>Nombre</th>
                                        <th>Apellido</th>
                                        <th>Celular</th>
                                       
                                        <th>Email</th>
                                        <th>Genero</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                        <?php foreach ($retornado as $mostrarciclo) {?>
                                      
                                   
                                        <td><?php echo $mostrarciclo->nomb_clie; ?></td>
                                        <td><?php echo $mostrarciclo->apell_clie;?></td>
                                        <td><?php echo $mostrarciclo->celu_clie; ?></td>
                                      
                                        <td><?php echo $mostrarciclo->email_clie; ?></td>
                                        <td><?php echo $mostrarciclo->genero_clie;?></td>
                                        <td>
                                            <a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)"
                                                title="Para eliminar click aqui"><i class="ti-trash cualquiera"></i></a>
                                            <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"
                                                title="Para actualizar click aqui"><i
                                                    class="ti-pencil actualiza"></i></a>
                                            <a onclick="imprimir(<?php echo $mostrarciclo->id;?>)"
                                                title="Para imprimir click aqui"><i class="ti-printer imprime"></i></a>
                                            <a onclick="perfil(<?php echo $mostrarciclo->id;?>)"
                                                title="Para ver su perfil click aqui"><i class="ti-eye"></i></a>
                                        </td>
                                    </tr>
                                    <?php } ?>
                                    <?php } ?>
                                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                    <?php foreach ($retornado as $mostrarciclo) {?>
                                      
                                   
                                      <td><?php echo $mostrarciclo->nomb_clie; ?></td>
                                      <td><?php echo $mostrarciclo->apell_clie;?></td>
                                      <td><?php echo $mostrarciclo->celu_clie; ?></td>
                                    
                                      <td><?php echo $mostrarciclo->email_clie; ?></td>
                                      <td><?php echo $mostrarciclo->genero_clie;?></td>
                                      <td>
                                      
                                          <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"
                                              title="Para actualizar click aqui"><i
                                                  class="ti-pencil actualiza"></i></a>
                                          <a onclick="imprimir(<?php echo $mostrarciclo->id;?>)"
                                              title="Para imprimir click aqui"><i class="ti-printer imprime"></i></a>
                                          <a onclick="perfil(<?php echo $mostrarciclo->id;?>)"
                                              title="Para ver su perfil click aqui"><i class="ti-eye"></i></a>
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
                    var url = 'ClienteControlador.php?accion=eliminar&id=' + idusuario;
                    location.href = url;
                } else {
                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(id) {
        var url = 'ClienteControlador.php?accion=actualizar&id=' + id;
        location.href = url;
    }
    function imprimir(id) {
        var url = 'ClienteControlador.php?accion=imprimir&id=' + id;
        location.href = url;
    }
    function perfil(id) {
        var url = 'ClienteControlador.php?accion=perfil&id=' + id;
        location.href = url;
    }
</script>

<?php require '../inc/footer.php'; ?>