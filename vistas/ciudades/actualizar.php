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
                <a href="../controlador/CiudadControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR CIUDAD</strong>
                </div>
                <div class="card-body card-block">
                    <form action="CiudadControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="accion" value="actualizar">
                                <label class=" form-control-label">Ciudad:</label>
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="<?php echo $actualizar->nombre_ciud;?>" required>
                            </div>
                            <!-- <div class="col-12 col-md-12">
                                <label class=" form-control-label">Pais:</label>
                                <select class="form-control dropdown" name="pais" id="pais">
                                    <?php foreach ($objetoretornado as $p){?>
                                    <option value="<?php echo $p->id;?>">
                                        <?php echo $p->Paises_id;?></option>
                                    <?php } ?>
                                </select>
                            </div> -->
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" class=" form-control" rows="4"
                                    required><?php echo $actualizar->descripcion_ciud;?></textarea>
                            </div>

                        </div>

                </div>
                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Registrar
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
            }

        },

        messages: {
            nombre: {
                required: "Por Favor Ingrese El nombre de la ciudad a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            descripcion: {
                required: "Por Favor Ingrese una descripcion de la ciudad a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
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