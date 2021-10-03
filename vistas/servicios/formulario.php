<?php require '../inc/header.php'; ?>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>FORMULARIO SERVICIOS</strong>
                </div>
                <div class="card-body card-block">
                    <form action="ServicioControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-12">
                                <input type="hidden" name="accion" value="insertar">
                                <label class=" form-control-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Nombre del Servicio"
                                    class="form-control" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="4"
                                    placeholder="Añadir Descripción..." class="form-control" required></textarea>
                            </div>

                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Servicio Adicional:</label>
                                <input type="text" id="adicional" name="adicional" placeholder="Servicio Adicional"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Costo Del Servicio:</label>
                                <input type="number" id="costo" name="costo" class="form-control"
                                    placeholder="Costo Del Servicio" required>

                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Hospedajes:</label>
                                <select class="form-control search dropdown" name="hospedajes" id="hospedajes" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($objetoretornadohospedaje as $hospedaje){?>
                                    <option value="<?php echo $hospedaje->id;?>">
                                        <?php echo $hospedaje->nombre_hosp . " " . $hospedaje->estrellas_hosp ." ★" ;?>
                                    </option>
                                    <?php } ?>
                                </select>
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
                        <br>
                        <button type="button" class="btn btn-primary" onclick="agregarhospedajes2()">Agregar
                            Hospedaje</button>
                        <table class="table" id="listadodehospedajes">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>| Nombre || N° Estrellas Hospedaje |</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
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
            hospedajes: 'required',
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
                required: "Por Favor Ingrese el nombre del servicio a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            descripcion: {
                required: "Por Favor Ingrese la descripción del servicio",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
            },
            adicional: {
                required: "Ingrese el servicio adicional a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 45"
            },
            hospedajes: 'Por Favor elija una opción',
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