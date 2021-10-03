<?php require '../inc/header.php'; ?>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>REGISTRO DE TRANSPORTE</strong>
                </div>
                <div class="card-body card-block">
                    <form action="TransporteControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <input type="hidden" name="accion" value="insertar">
                                <label class=" form-control-label">Nombre Transporte:</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Nombre del Transporte"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4"
                                    placeholder="Agregue una Descripción..." class="form-control" required></textarea>
                            </div>

                        </div>
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check-square-o"></i> Registrar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>

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
                required: "Por Favor Ingrese El nombre del transporte a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            descripcion: {
                required: "Por Favor Ingrese una descripcion del transporte a registrar",
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