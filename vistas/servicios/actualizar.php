<?php 
require '../inc/header.php';
// error_reporting(0);
// $varsesion = $_SESSION['rol'];
// if ($varsesion == null || $varsesion = '') {
//     echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Usted no ha iniciado una sesión o no cuenta con los privilegios adecuados para realizar esta acción.</h2></div> </div></div></body> ' ; 
//     die();
// }
// if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { 
//     // header("location: ../cliente/actualizar.php");
//  }
?>

<?php foreach ($objetoretornado as $actualizar){}?>
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
        <a href="../controlador/ServicioControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR SERVICIOS</strong>
                </div>
                <div class="card-body card-block">
                    <form action="ServicioControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-12">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <label class=" form-control-label">Nombre Servicio:</label>
                                <input type="text" id="nombre" name="nombre" class=" form-control"
                                    value="<?php echo $actualizar->nombre_serv;?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4" class=" form-control"
                                    required><?php echo $actualizar->descripcion_serv;?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Servicio Adicional:</label>
                                <input type="text" id="adicional" name="adicional" class=" form-control"
                                    value="<?php echo $actualizar->servicios_adi_serv;?>" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Costo Del Servicio:</label>
                                <input type="number" id="costo" name="costo" class=" form-control"
                                    value="<?php echo $actualizar->costo_serv;?>" required>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check-square-o"></i> Actualizar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>

            </div>

        </div>

    </div><!-- .animated -->
</div><!-- .content -->

<script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    // jQuery.validator.addMethod('lettersonly', function(value, element) {
    //  return this.optional(element) || /^[a-z áãâäàéêëèíîïìóõôöòúûüùçñ]+$/i.test(value);
    //     }, "Ingrese solo letras");

    $("#validacion").validate({
        errorElement: "div",
        rules: {
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 45
            },
            descripcion: {
                required: true,
                minlength: 5,
                maxlength: 200
            },
            adicional: {
                required: true,

                minlength: 3,
                maxlength: 45
            },
            costo: {
                required: true,
                digits: true,
                number: true,
                minlength: 3,
                maxlength: 10
            }

        },

        messages: {
            nombre: {
                required: "Por Favor Ingrese el nombre del servicio a actualizar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            descripcion: {
                required: "Por Favor Ingrese la descripción del servicio",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
            },
            adicional: {
                required: "Ingrese el servicio adicional a actualizar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 45"
            },
            costo: {
                required: "Ingrese el costo del servicio",
                digits: "No se admiten números negativos ni puntos",
                number: "Por Favor Ingrese Un Numero Valido",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 10"
            }


        }

    });
    (function () {
        'use strict';

        window.addEventListener('load', function () {
            var form = document.getElementById('validacion');
            form.addEventListener('submit', function (event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
            }, false);
        }, false);
    })();
</script>
<?php require '../inc/footer.php'; ?>