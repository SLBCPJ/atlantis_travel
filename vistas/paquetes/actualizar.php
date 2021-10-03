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
           <a href="../controlador/PaqueteControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR PAQUETES</strong>
                </div>
                <div class="card-body card-block">
                    <form action="PaqueteControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-6">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <label class=" form-control-label">Nombre Paquete:</label>
                                <input type="text" id="nombre" class="form-control" name="nombre"
                                    value="<?php echo $actualizar->nomb_paqu;?>" required>
                            </div>
                            <style>
                                .centrado {
                                    margin: 10px auto;
                                    display: block;
                                }

                                .color {
                                    color: red;
                                }
                            </style>
                            <div class="col col-md-6">
                                <!-- <h3 style="text-align: center" class="header color">Foto actual</h3> -->
                                <img alt="avatar" src="<?php echo $actualizar->foto_url_paqu; ?>" width="100"
                                    height="100">
                            </div>
                            <div class="col col-md-6">
                                <label for="file-input" class=" form-control-label">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea id="descripcion" name="descripcion" class="form-control" cols="50" rows="4"
                                    required><?php echo $actualizar->descripcion_paqu;?></textarea>
                            </div>

                        </div>
                                <div class="row form-group">
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Duración</label>
                                <input type="text" id="duracion" name="duracion" class="form-control"  value="<?php echo $actualizar->duracion_paqu;?>" required>
                            </div>
                            
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Fecha de Salida:</label>
                                <input type="date" id="fecha" name="fecha" class="form-control"  value="<?php echo $actualizar->fecha_paqu;?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Tour:</label>
                                <textarea id="tour" name="tour" class="form-control" cols="50" rows="1"
                                    required><?php echo $actualizar->tour_paqu;?></textarea>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Obsequio:</label>
                                <textarea id="obsequio" name="obsequio" class="form-control" cols="50" rows="1"
                                    required><?php echo $actualizar->obsequio_paqu;?></textarea>
                            </div>

                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Precio:</label>
                                <input type="number" id="precio" name="precio" class="form-control"
                                    value="<?php echo $actualizar->prec_paqu;?>" required>
                            </div>
                        </div>
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-dot-circle-o"></i> Actualizar
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
            foto: 'required',
            descripcion: {
                required: true,
                minlength: 6,
                maxlength: 200
            },
            tour: {
                required: true,
                minlength: 6,
                maxlength: 200
            },
            obsequio: {
                required: true,
                minlength: 4,
                maxlength: 200
            },
            precio: {
                required: true,
                digits: true,
                number: true,
                minlength: 3,
                maxlength: 10
            }
        },

        messages: {
            nombre: {
                required: "Ingrese el nombre del paquete turistico a actualizar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            foto: "Por favor elija una foto del paquete turistico a actualizar",
            descripcion: {
                required: "Por Favor Ingrese una descripcion del paquete turistico a actualizar",
                minlength: jQuery.validator.format("Al Menos {0} caracteres Son Necesarios!"),
                maxlength: "Maximos Caracteres Permitidos: 200"
            },
            tour: {
                required: "Ingrese el tour del paquete turistico a actualizar",
                minlength: jQuery.validator.format("Al Menos {0} caracteres Son Necesarios!"),
                maxlength: "Maximos Caracteres Permitidos: 200"
            },
            obsequio: {
                required: "Ingrese el obsequio del paquete turistico a actualizar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
            },
            precio: {
                required: "Ingrese el precio del paquete turistico a actualizar",
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