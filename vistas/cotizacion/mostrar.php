<?php 
require '../inc/header.php';
// error_reporting(0);
// $varsesion = $_SESSION['email'];
// if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) {
//         echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Usted no ha iniciado una sesión o no cuenta con los privilegios adecuados para realizar esta acción.</h2></div> </div></div></body> ' ;  
//     die();
// }
// if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador" || $_SESSION['rol']=="Cliente")) {

//     // header("location: ../usuarios/login.php");
//  }
?>
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">

            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Lista de Cotizaciones</strong>
                    </div>
                    <div class="card-body">
                    <a href="../controlador/CotizacionControl.php?accion=insertar"> <button type="submit"
                                class="btn btn-success btn-sm">
                                <i class="ti-plus"></i> Nuevo Registro
                            </button></a><br>
                    <div class="table-responsive">
                        <table id="bootstrap-data-table-export" class="table table-hover table table-striped">
                            <thead>
                                <tr>
                                    <th>Fecha Salida</th>
                                    <th>Fecha Llegada</th>
                                    <th>Adultos</th>
                                    <th>Menores</th>
                                    <th>Precio</th>
                                    <th>Clientes</th>
                                    <th>Ciudades</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { ?>
                                    <?php foreach ($objetoretornado as $mostrarciclo) {?>

                                    <td><?php echo $mostrarciclo->fecha_salida_coti; ?></td>
                                    <td><?php echo $mostrarciclo->fecha_llegada_coti; ?></td>
                                    <td><?php echo $mostrarciclo->adultos_coti; ?></td>
                                    <td><?php echo $mostrarciclo->menores_coti; ?></td>
                                    <td><?php echo $mostrarciclo->precio_coti; ?></td>
                                    <td><?php foreach ($clie as $infoclie ){
                                    if($infoclie->id == $mostrarciclo->Clientes_id)
                                    echo $infoclie->nomb_clie . " " . $infoclie->apell_clie;} ?></td>
                                    <td><?php foreach ($ciud as $infociudad ){
                                    if($infociudad->id == $mostrarciclo->Ciudades_id)
                                    echo $infociudad->nombre_ciud;} ?>
                                    <td><a onclick="eliminar(<?php echo $mostrarciclo->id; ?>)"
                                            title="Para eliminar click aqui"><i class="ti-trash "></i></a>
                                        <a onclick="actualizar(<?php echo $mostrarciclo->id; ?>)"
                                            title="Desea actualizar? click aqui"><i class="ti-write "></i></a>
                                        <a onclick="imprimir(<?php echo $mostrarciclo->id; ?>)"
                                            title="Para imprimir click aqui"><i class="ti-printer "></i></a>
                                        <!-- <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"><i class="eye icon ver"></i></a></td> -->
                                        <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"
                                            title="Para ver el detalle de la cotización click aqui"><i class="fa fa-eye "></i></a>
                                            </td>
                                </tr>
                                <?php } ?>
                                <?php } ?>
                                <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Cliente")) { ?>
                                    <?php foreach ($objetoretornado as $mostrarciclo) {?>

                                    <td><?php echo $mostrarciclo->fecha_salida_coti; ?></td>
                                    <td><?php echo $mostrarciclo->fecha_llegada_coti; ?></td>
                                    <td><?php echo $mostrarciclo->adultos_coti; ?></td>
                                    <td><?php echo $mostrarciclo->menores_coti; ?></td>
                                    <td><?php echo $mostrarciclo->precio_coti; ?></td>
                                    <td><?php foreach ($clie as $infoclie ){
                                    if($infoclie->id == $mostrarciclo->Clientes_id)
                                    echo $infoclie->nomb_clie . " " . $infoclie->apell_clie;} ?></td>
                                    <td><?php foreach ($ciud as $infociudad ){
                                    if($infociudad->id == $mostrarciclo->Ciudades_id)
                                    echo $infociudad->nombre_ciud;} ?>
                                    <td>
                                        <!-- <a onclick="imprimir(<?php echo $mostrarciclo->id; ?>)"
                                            title="Para imprimir click aqui"><i class="ti-printer "></i></a> -->
                                        <!-- <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"><i class="eye icon ver"></i></a></td> -->
                                        <a onclick="detalle(<?php echo $mostrarciclo->id; ?>)"
                                            title="Para ver el detalle de la cotización click aqui"><i class="fa fa-eye "></i></a>
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


<script >
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
    //         content: 'Para Imprimir click aqui'
    //     });
    // $('.ver')
    //     .popup({
    //         position: 'right center',
    //         title: '¿Desea ver el detalle?',
    //         content: 'Para ver click aqui'
    //     });
    // $(document).ready(function() {
    //     $('#bootstrap-data-table-export').dataTable( {
    //         "language": {
    //             "url": "dataTables.german.lang"
    //         }
    //     } );
    // } );

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
                    var url = 'CotizacionControl.php?accion=eliminar&id=' + idusuario;
                    location.href = url;
                } else {

                    swal("¡No se ha eliminado el registro!", {
                        icon: "error",
                    });

                }
            });
    }
    function actualizar(idactualizar) {
        var url = 'CotizacionControl.php?accion=actualizar&id=' + idactualizar;
        location.href = url;
    }
    function imprimir(id) {
        var url = 'CotizacionControl.php?accion=imprimir&id=' + id;
        location.href = url;
    }
    function detalle(id) {
        var url = 'CotizacionXPaqueteControlador.php?accion=detalle&id=' + id;
        location.href = url;
    }
    function modaldetalle(id) {
        var url = 'CotizacionXPaqueteControlador.php?accion=detalle&id=' + id;
        $('#exampleModalCenter').on('shown.bs.modal', function () {
  $('#myInput').trigger('focus')
})

    }
</script>

<?php require '../inc/footer.php'; ?>