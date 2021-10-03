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

<?php foreach ($retornado as $actualizar){}?>
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
            <a href="../controlador/ClienteControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR CLIENTE</strong>
                </div>
                <div class="card-body card-block">
                    <form action="ClienteControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">
                            <div class="col-12 col-md-6">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <label class=" form-control-label">Tipo de Identificacion</label>
                                <select name="tipoid" id="tipoid" class="form-control">
                                    <option value="CC" <?php if($actualizar->tipo_iden_clie=="CC") echo "selected"; ?>>
                                        Cedula Cuidadania</option>
                                    <option value="TI" <?php if($actualizar->tipo_iden_clie=="TI") echo "selected"; ?>>
                                        Tarjeta de Identidad</option>
                                    <option value="CE" <?php if($actualizar->tipo_iden_clie=="CE") echo "selected"; ?>>
                                        Cedula Extranjera</option>
                                    <option value="DNI"
                                        <?php if($actualizar->tipo_iden_clie=="DNI") echo "selected"; ?>>Documento
                                        Nacional de Identidad</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Numero de Identificacion</label>
                                <input type="number" name="numeroid" value="<?php echo $actualizar->nume_id_clie;?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Nombre (s)</label>
                                <input type="text" name="nombre" value="<?php echo $actualizar->nomb_clie;?>"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Apellidos</label>
                                <input type="text" name="apellido" value="<?php echo $actualizar->apell_clie;?>"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Fecha de Nacimiento</label>
                                <input type="date" name="fechanaci" value="<?php echo $actualizar->fecha_naci_clie;?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Telefono</label>
                                <input type="number" name="telefono" value="<?php echo $actualizar->tele_clie;?>"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Celular</label>
                                <input type="number" name="celular" value="<?php echo $actualizar->celu_clie;?>"
                                    class="form-control" required>

                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Direccion</label>
                                <input type="text" name="direccion" value="<?php echo $actualizar->dire_clie;?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Email</label>
                                <input type="text" name="email" value="<?php echo $actualizar->email_clie;?>"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Genero:</label>
                                <select name="genero" id="genero" class="form-control" required>
                                    <option value="Masculino"
                                        <?php if($actualizar->genero_clie=="Masculino") echo "selected"; ?>>
                                        Masculino</option>
                                    <option value="Femenino"
                                        <?php if($actualizar->genero_clie=="Femenino") echo "selected"; ?>>
                                        Femenino</option>
                                        <option value="Femenino"
                                        <?php if($actualizar->genero_clie=="Otro") echo "selected"; ?>>
                                        Otro</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Estado Civil</label>
                                <select name="estado" id="estado" class="form-control" class="form-control" required>
                                    <option value="Soltero"
                                        <?php if($actualizar->estado_civil_clie=="Soltero") echo "selected"; ?>>
                                        Soltero/a</option>
                                    <option value="Comprometido"
                                        <?php if($actualizar->estado_civil_clie=="Comprometido") echo "selected"; ?>>
                                        Comprometido/a
                                    </option>
                                    <option value="Casado"
                                        <?php if($actualizar->estado_civil_clie=="Casado") echo "selected"; ?>>
                                        Casado/a</option>
                                    <option value="Separado"
                                        <?php if($actualizar->estado_civil_clie=="Separado") echo "selected"; ?>>
                                        Separado/a</option>
                                    <option value="Viudo"
                                        <?php if($actualizar->estado_civil_clie=="Viudo") echo "selected"; ?>>
                                        Viudo/a</option>
                                </select>
                            </div>
                        </div>
                        <div class="" style="text-align: center">
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
    function validar(evento) {
        key = evento.keyCode || evento.which;
        teclado = String.fromCharCode(key).toLocaleLowerCase();
        nombre = " abcdefghijklmnñopqrstuvwxyz";
        especiales = "37-38-46";

        teclado_especial = false;
        for (var i in especiales) {
            if (key == especiales[i]) {
                teclado_especial = true; break;
            }
        }
        if (nombre.indexOf(teclado) == -1 && !teclado_especial) {
            return false;
        }
    }
    $("#validacion").validate({
        errorElement: "div",
        rules: {
            tipoid: 'required',
            numeroid: {
                required: true,
                digits: true,
                number: true,
                minlength: 6,
                maxlength: 10
            },
            nombre: {
                required: true,

                minlength: 3,
                maxlength: 45
            },
            apellido: {
                required: true,

                minlength: 3,
                maxlength: 45
            },
            fechanaci: 'required',
            telefono: {
                required: true,
                digits: true,
                number: true,
                minlength: 6,
                maxlength: 10
            },
            celular: {
                required: true,
                digits: true,
                number: true,
                minlength: 10,
                maxlength: 10
            },
            direccion: {
                required: true,
                minlength: 4,
                maxlength: 30
            },
            email: {
                required: true,
                email: true
            },
            genero: 'required',
            estado: 'required'

        },

        messages: {
            tipoid: {
                required: "Completa Este Campo",
            },
            numeroid: {
                required: "Por Favor ingrese el número de identificación que desea actualizar",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 10"
            },
            nombre: {
                required: "Por Favor Ingrese el nombre que desea actualizar",
                lettersonly: "Por Favor Ingrese Solo Letras",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            apellido: {
                required: "Por Favor Ingrese el Apellido que desea actualizar",
                lettersonly: "Por Favor Ingrese Solo Letras",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            fechanaci: "Por Favor Ingrese Fecha de Nacimiento que desea actualizar",
            telefono: {
                required: "Por Favor Ingrese el Numero de Telefono que desea actualizar",
                digits: "No se admiten números negativos ni puntos",
                number: "Por Favor Ingrese Un Numero Valido",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 10"
            },
            celular: {
                required: "Por Favor Ingrese el Numero de celular que desea actualizar",
                digits: "No se admiten números negativos ni puntos",
                number: "Por Favor Ingrese Un Numero Valido",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 10"
            },
            direccion: {
                required: "Por Favor Ingrese la Dirección que desea actualizar",
                minlength: jQuery.validator.format("Al Menos {0} Caracteres Son Necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            email: {
                required: "Por Favor Ingrese el Email que desea actualizar",
                email: "Recuerde que debe ser formato E-mail"
            },
            genero: "Por Favor Elija Una Opcion que desea actualizar",
            estado: "Por Favor Elija Una Opcion que desea actualizar"


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