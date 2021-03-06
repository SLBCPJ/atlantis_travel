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
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR USUARIO</strong>
                </div>
                <div class="card-body card-block">
                    <form action="UsuarioControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-12">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <label class=" form-control-label">Nombre Completo</label>
                                <input type="text" id="nombre" name="nombre"
                                    value="<?php echo $actualizar->nombre_usua;?>" class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Email</label>
                                <input type="text" id="email" name="email" value="<?php echo $actualizar->email_usua;?>"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Rol</label>
                                <select name="rol" id="rol" class="form-control" required>
                                    <!-- <option value="">Seleccione</option> -->
                                    <option value="Administrador" disabled>Administrador</option>
                                    <option value="Cliente" selected>Cliente</option>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Contraseña</label>
                                <input type="password" id="contrasena" name="contrasena" placeholder="Contraseña"
                                    class="form-control" required>
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
            nombre: {
                required: true,
                minlength: 3,
                maxlength: 45
            },
            email: {
                required: true,
                email: true
            },
            rol: 'required',
            contrasena: {
                required: true,
                minlength: 4,
                maxlength: 8
            }

        },

        messages: {
            nombre: {
                required: "Por Favor Ingrese El nombre completo del usuario a registrar",
                // lettersonly: "Por Favor Ingrese Solo Letras",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            rol: "Por Favor Elija Una Opcion",
            email: {
                required: "Por Favor Ingrese un Email",
                email: "Recuerde que debe ser formato E-mail"
            },
            contrasena: {
                required: "Este valor no puede quedar en blanco",
                minlength: "La contraseña debe tener mas de 4 caracteres",
                maxlength: "La contraseña debe tener menos de 30 caracteres"
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