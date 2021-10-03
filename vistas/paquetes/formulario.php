<?php require '../inc/header.php'; ?>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>FORMULARIO PAQUETES</strong>
                </div>
                <div class="card-body card-block">
                    <form action="PaqueteControlador.php" method="post" enctype="multipart/form-data"
                        class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-6">
                                <input type="hidden" name="accion" value="insertar">
                                <label class=" form-control-label">Nombre:</label>
                                <input type="text" id="nombre" name="nombre" placeholder="Nombre del Paquete Turistico"
                                    class="form-control" required>
                            </div>
                            <div class="col col-md-6">
                                <label for="file-input" class=" form-control-label">Foto</label>
                                <input type="file" id="foto" name="foto" class="form-control-file" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Descripción</label>
                                <textarea name="descripcion" id="descripcion" rows="2" placeholder="Descripción..."
                                    class="form-control" required></textarea>
                            </div>

                        </div>
                                 <div class="row form-group">
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Duración</label>
                                <input type="text" id="duracion" name="duracion" placeholder="Duración del Paquete Turistico"
                                    class="form-control" required>
                            </div>
                            <div class="col-12 col-md-6">
                                <label class=" form-control-label">Fecha de Salida:</label>
                                <input type="date" id="fecha" name="fecha" placeholder="Fecha de Salida"
                                    class="form-control" required min=<?php $hoy=date("Y-m-d"); echo $hoy;?>>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Tour:</label>
                                <textarea name="tour" id="tour" cols="10" rows="1" placeholder="Agregar Tour..."
                                    class="form-control" required></textarea>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Obsequio:</label>
                                <textarea name="obsequio" id="obsequio" rows="1" placeholder="Agregar Obsequio..."
                                    class="form-control" required></textarea>
                            </div>
                            <div class="col-12 col-md-4">
                                <label class=" form-control-label">Precio:</label>
                                <input type="number" name="precio" id="precio" placeholder="Precio" class="form-control"
                                    required>
                            </div>

                        </div>
                        <div class="row form-group">
                        <div class="col-12 col-md-12">
                                <label class=" form-control-label">Servicios:</label>
                                <select class="form-control search dropdown" name="servicios" id="servicios" required>
                                    <option value="">Seleccione...</option>
                                    <?php foreach ($objetoretornadoservicio as $servicio){?>
                                    <option value="<?php echo $servicio->id;?>">
                                        <?php echo $servicio->nombre_serv . " " . $servicio->servicios_adi_serv;?>
                                    </option>
                                    <?php } ?>
                                </select>
                            </div>
                            </div>



                        <!-- <div class="row form-group">
                            <div class="col-12 col-md-12">
                                <label class=" form-control-label">Precio:</label>
                                <input type="number" id="precio" name="precio" placeholder="Precio"
                                    class="form-control" required>
                            </div>
                        </div> -->
                        <div class="card-footer" style="text-align: center">
                            <button type="submit" class="btn btn-primary btn-sm">
                                <i class="fa fa-check-square-o"></i> Registrar
                            </button>
                            <button type="reset" class="btn btn-danger btn-sm">
                                <i class="fa fa-ban"></i> Cancelar
                            </button>
                        </div>
                        <br>
                        <button type="button" class="btn btn-primary" onclick="agregarservicios()">Agregar
                            Servicio</button>
                        <table class="table" id="listadodeservicios">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>| Nombre || Servicio Adicional |</th>
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
    $(document).ready( function() {
    $('#fecha').val(new Date().toDateInputValue());
});

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
            duracion: {
                required: true,
                minlength: 3,
                maxlength: 20
            },
            fecha: 'required',
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
            servicios: 'required',
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
                required: "Ingrese el nombre del paquete turistico a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 30"
            },
            foto: "Por favor elija una foto del paquete turistico a registrar",
            descripcion: {
                required: "Por Favor Ingrese una descripcion del paquete turistico a registrar",
                minlength: jQuery.validator.format("Al Menos {0} caracteres Son Necesarios!"),
                maxlength: "Maximos Caracteres Permitidos: 200"
            },
            duracion: {
                required: "Por Favor Ingrese la duracion del paquete turistico a registrar",
                minlength: jQuery.validator.format("Al Menos {0} caracteres Son Necesarios!"),
                maxlength: "Maximos Caracteres Permitidos: 20"
            },
            fecha: "Por favor ingrese una fecha de salida del paquete turistico a registrar",
            tour: {
                required: "Ingrese el tour del paquete turistico a registrar",
                minlength: jQuery.validator.format("Al Menos {0} caracteres Son Necesarios!"),
                maxlength: "Maximos Caracteres Permitidos: 200"
            },
            obsequio: {
                required: "Ingrese el obsequio del paquete turistico a registrar",
                minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                maxlength: "Maximos caracteres permitidos: 200"
            },
             servicios: "Por favor elija una opción",
            precio: {
                required: "Ingrese el precio del paquete turistico",
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