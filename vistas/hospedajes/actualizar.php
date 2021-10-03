<?php require '../inc/header.php'; ?>
<?php foreach ($retornado as $actualizar){}?>
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
              <a href="../controlador/HospedajeControlador.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR HOSPEDAJE</strong>
                </div>
                <div class="card-body card-block">
                    <form action="HospedajeControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-4">
                                <input type="hidden" name="accion" value="actualizar">
                                <input type="hidden" name="id" value="<?php echo $actualizar->id;?>">
                                <label class=" form-control-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" class="form-control"
                                    value="<?php echo $actualizar->nombre_hosp;?>" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Estrellas:</label>
                                <input type="text" id="estrellas" name="estrellas" class="form-control"
                                    value="<?php echo $actualizar->estrellas_hosp;?>" required>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Habitaciones:</label>
                                <input type="number" id="habitaciones" name="habitaciones" class="form-control"
                                    value="<?php echo $actualizar->habitaciones_hosp;?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descri" id="descri" rows="4" placeholder="Descripción..."
                                    class="form-control"
                                    required><?php echo $actualizar->descripcion_hosp; ?></textarea>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-2">
                                <label class=" form-control-label">Wifi:</label>
                                <select name="wifi" id="wifi" class="form-control" required>
                                    <option value="Si" <?php if($actualizar->wifi_hosp=="Si") echo "selected"; ?>>
                                        Si</option>
                                    <option value="No" <?php if($actualizar->wifi_hosp=="No") echo "selected"; ?>>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label class="">Aire
                                    Acondicionado:</label>
                                <select name="aire" id="aire" class="form-control" required>
                                    <option value="Si"
                                        <?php if($actualizar->aire_acondicionado_hosp=="Si") echo "selected"; ?>>
                                        Si</option>
                                    <option value="No"
                                        <?php if($actualizar->aire_acondicionado_hosp=="No") echo "selected"; ?>>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-2"><label class=" form-control-label">Piscina:</label>
                                <select name="piscina" id="piscina" class="form-control" required>
                                    <option value="Si" <?php if($actualizar->piscina_hosp=="Si") echo "selected"; ?>>
                                        Si</option>
                                    <option value="No" <?php if($actualizar->piscina_hosp=="No") echo "selected"; ?>>
                                        No</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-2"><label class=" form-control-label">Parqueadero:</label>
                                <select name="parqueadero" id="parqueadero" class="form-control" required>
                                    <option value="Si"
                                        <?php if($actualizar->parqueadero_hosp=="Si") echo "selected"; ?>>
                                        Si</option>
                                    <option value="No"
                                        <?php if($actualizar->parqueadero_hosp=="No") echo "selected"; ?>>
                                        No</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-3">
                                <label for="file-input" class=" form-control-label">Foto:</label>
                                <input type="file" id="foto" name="foto" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col-12 col-md-12">
                                <label class=" form-control-label">Precio Por Noche:</label>
                                <input type="number" id="precio" name="precio"  value="<?php echo $actualizar->precio_hosp;?>"
                                    class="form-control" required>
                            </div>
                            </div>
              

                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-success btn-sm">
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
</div><!-- /#right-panel -->
<!-- Right Panel -->
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
            estrellas: {
                required: true,
                digits: true,
                number: true,
                minlength: 1,
                maxlength: 5
            },
            habitaciones: {
                required: true,
                digits: true,
                number: true,
                minlength: 1,
                maxlength: 50
            },
            descri: {
                required: true,
                minlength: 4,
                maxlength: 200
            },
             precio: {
                required: true,
                minlength: 4,
                maxlength: 11
             },
            wifi: 'required',
            aire: 'required',
            piscina: 'required',
            parqueadero: 'required',
            foto: 'required'

        },

        messages: {
            nombre: {
                required: "Ingrese el nombre del hospedaje a actualizar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            estrellas: {
                required: "Por Favor Ingrese el número de estrellas",
                digits: "No se admiten números negativos ni puntos",
                number: "Por Favor Ingrese Un número Valido",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 5"
            },
            habitaciones: {
                required: "Por favor Ingrese el número de habitaciones",
                digits: "No se admiten números negativos ni puntos",
                number: "Por Favor Ingrese Un número Valido",
                minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                maxlength: "Maximos Digitos Permitidos: 50"
            },
            descri: {
                required: "Ingrese la descripcion del hospedaje a actualizar",
                minlength: jQuery.validator.format("Al Menos {0} Caracteres Son Necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
            },
            precio: {
            required: "Ingrese el precio del hospedaje a actualizar",
            minlength: jQuery.validator.format("Al Menos {0} digitos Son Necesarios!"),
             maxlength: "Maximos digitos permitidos: 11"
             },
            wifi: "Por Favor Elija Una Opcion",
            aire: "Por Favor Elija Una Opcion",
            piscina: "Por Favor Elija Una Opcion",
            parqueadero: "Por Favor Elija Una Opcion",
            foto: "Por Favor seleccione una foto del hospedaje a actualizar"


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