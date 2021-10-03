<?php   
require '../inc/header.php';
// error_reporting(0);
// $varsesion = $_SESSION['email'];
// if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) {
//         echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Usted no ha iniciado una sesión o no cuenta con los privilegios adecuados para realizar esta acción.</h2></div> </div></div></body> ' ;  
//     die();

?>
<input type="hidden" name="accion" value="inicio">

<div class="col-md-12">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                                <strong class="card-title mb-3">Te damos la bienvenida</strong>
                            </div>
                            <div class="card-body">
                                <div class="mx-auto d-block">
                                    <img class=" mx-auto d-block" src="../img/LOGO.jpg" alt="Card image cap">
                                    <h5 class="text-sm-center mt-2 mb-1">Nombre: <?php echo $_SESSION['nombre']; ?></h5>
                                    <div class="location text-sm-center"><i class="fa fa-user"></i> Rol: <?php echo $_SESSION['rol']; ?></div>
                                </div>
                                <hr>
                          
                            </div>
                        </div>
                    </div>


<?php   
require '../inc/footer.php';
?>
