<?php require '../inc/header.php'; ?>
<?php foreach ($objetoretornado as $datosactualizar){}?>
<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="col-lg-12">
                       <a href="../controlador/CotizacionControl.php?accion=mostrar"> <button type="submit" class="btn btn-primary btn-sm">
    <i class="ti-arrow-circle-left"></i> Regresar
  </button></a><br>
            <div class="card">
                <div class="card-header" style="text-align: center">
                    <strong>ACTUALIZAR COTIZACION</strong>
                </div>
                <div class="card-body card-block">
                    <form action="CotizacionControl.php" method="POST" class="form-horizontal" id="validacion" novalidate>
                        <div class="row form-group">

                            <div class="col-12 col-md-6">
                            <input type="hidden" name="accion" value="actualizar">
                    <input type="hidden" name="id" value="<?php echo $datosactualizar->id;?>">
                                <label for="form-control-label">Fecha de Salida</label>
                                <input type="date" name="fecha_salida" class="form-control" id="fecha_salida"
                                value="<?php echo $datosactualizar->fecha_salida_coti;?>" required>
                            </div>
                            <div class="col col-md-6">
                                <label for="form-control-label">Fecha de Llegada</label>
                                <input type="date" name="fecha_llegada" class="form-control" id="fecha_llegada"
                                value="<?php echo $datosactualizar->fecha_llegada_coti;?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-12 col-md-4">
                                <label for="form-control-label">Adultos:</label>
                                <input type="number" name="adultos" class="form-control" id="adultos"
                                value="<?php echo $datosactualizar->adultos_coti;?>" required>
                            </div>

                            <div class="col-12 col-md-4">
                                <label for="form-control-label">Menores:</label>
                                <input type="number" name="menores" class="form-control" id="menores"
                                value="<?php echo $datosactualizar->menores_coti;?>" required>

                            </div>

                            <div class="col-12 col-md-4">
                                <label for="">Precio:</label>
                                <input type="number" name="precio" class="form-control" id="precio"
                                value="<?php echo $datosactualizar->precio_coti;?>" required>
                            </div>
                        </div>
                        <div class="row form-group">
                        <div class="col-12 col-md-6">
                            <label class=" form-control-label">Ciudad:</label>
                            <select class="form-control search dropdown" name="ciudades" id="ciudades" required>
                            <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadociudad as $p){?>
                                <option value="<?php echo $p->id;?>">
                                    <?php echo $p->nombre_ciud;?></option>
                                <?php } ?>
                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label class=" form-control-label">Clientes:</label>
                            <select class="form-control" data-live-search="true" name="clientes" id="clientes" required>
                            <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadocliente as $c){?>
                                <option value="<?php echo $c->id;?>">
                                    <?php echo $c->nomb_clie . " " . $c->apell_clie . " " . $c->email_clie;?>
                                </option>
                                <?php } ?>

                            </select>
                        </div>
                        </div>
                        <!-- <div class="row form-group">
                        <div class="col-12 col-md-6">
                            <label class=" form-control-label">Paquetes Turisticos:</label>
                            <select class="form-control" data-live-search="true" name="paquetes" id="paquetes" required>
                            <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadopaquete as $paquete){?>
                                <option value="<?php echo $paquete->id;?>">
                                    <?php echo $paquete->nomb_paqu . " $" . $paquete->prec_paqu;?></option>
                                <?php } ?>

                            </select>
                        </div>

                        <div class="col-12 col-md-6">
                            <label for="">Transportes</label>
                            <select class="form-control" name="transportes" id="transportes" required>
                            <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadotransporte as $transporte){?>
                                <option value="<?php echo $transporte->id;?>">
                                    <?php echo $transporte->nombre_tran . " " . $transporte->descripcion_tran;?>
                                </option>
                                <?php } ?>
                            </select>
                        </div>
                        </div>
                        <div class="row form-group">
                        <div class="col-12 col-md-6">
                            <label for="">Hospedajes</label>

                            <select class="form-control" name="hospedajes" id="hospedajes" required>
                            <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadohospedaje as $hospedaje){?>
                                <option value="<?php echo $hospedaje->id;?>">
                                    <?php echo $hospedaje->nombre_hosp . " " . $hospedaje->estrellas_hosp. " ★";?>
                                </option>
                                <?php } ?>
                            </select>
                        </div> -->
                        <!-- <div class="col-12 col-md-6">
                            <label for="">Servicios</label>

                            <select class="form-control" name="servicios" id="servicios" required>
                                <option value="">Seleccione...</option>
                                <?php foreach ($objetoretornadoservicio as $servicio){?>
                                <option value="<?php echo $servicio->id;?>">
                                    <?php echo $servicio->nombre_serv . " $" . $servicio->costo_serv;?></option>
                                <?php } ?>
                            </select>
                        </div> -->
                </div>
     
                
                <div class="card-footer" style="text-align: center">
                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fa fa-dot-circle-o"></i> Actualizar
                    </button>
                    <button type="reset" class="btn btn-danger btn-sm">
                        <i class="fa fa-ban"></i> Cancelar
                    </button>
                </div>
                <br>
                <!-- <button type="button" class="btn btn-primary" onclick="agregarpaquetes()">Agregar Paquete
                    Turistico</button>
                <table class="table" id="listadodepaquetes">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>| Nombre || Precio del Paquete Turistico |</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="agregartransportes()">Agregar Transporte</button>
                <table class="table" id="listadodetransportes">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>| Nombre || Descripcion del Transporte |</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table>
                <button type="button" class="btn btn-primary" onclick="agregarhospedajes()">Agregar Hospedaje</button>
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
                <button type="button" class="btn btn-primary" onclick="agregarservicios()">Agregar Servicio</button>
                <table class="table" id="listadodeservicios">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>| Nombre || Precio del Servicio |</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
                </table> -->
                </form>
            </div>

        </div>

    </div>

</div><!-- .animated -->
</div><!-- .content -->

<script>
$("#validacion").validate({
    errorElement: "div",
    rules: {

        adultos:{
            required: true,
            digits: true,
            number: true,
            minlength: 1,
            maxlength: 59
        },
        menores: {
            required: true,
            digits: true,
            number: true,
            minlength: 0,
            maxlength: 50
        },
        precio: {
            required: true,
            digits: true,
            number: true,
            minlength: 3,
            maxlength: 10
        },
        ciudades: 'required',
        clientes: 'required',
        // paquetes: 'required',
        // transportes: 'required',
        // hospedajes: 'required',
        // servicios: 'required',
        fecha_salida: 'required',
        fecha_llegada: 'required'
    },

    messages: {

        adultos: {
            required: "Por Favor Ingrese el número de adultos en la cotización a actualizar",
            digits: "No se admiten números negativos ni puntos",
            number: "Por Favor Ingrese Un número Valido",
            minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
            maxlength: "Maximos Digitos Permitidos: 59"
        },
        menores: { 
            required: "Por Favor Ingrese el número de menores de 2 a 17 años de la cotización a actualizar",
            digits: "No se admiten números negativos ni puntos",
            number: "Por Favor Ingrese Un número Valido",
            minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
            maxlength: "Maximos Digitos Permitidos: 50"
        },
        precio: { 
            required: "Por favor Ingrese el precio de la cotización que desea actualizar",
            digits: "No se admiten números negativos ni puntos",
            number: "Por Favor Ingrese Un número Valido",
            minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
            maxlength: "Maximos Digitos Permitidos: 10"
        },
        ciudades: "Por Favor elija una opción",
        clientes: "Por Favor elija una opción",
        // paquetes: "Por Favor elija una opción",
        // transportes: "Por Favor elija una opción",
        // hospedajes: "Por Favor elija una opción",
        // servicios: "Por Favor elija una opción",
        fecha_salida: "Por Favor seleccione la fecha de salida de la cotización a actualizar",
        fecha_llegada: "Por Favor seleccione la fecha de llegada de la cotización a actualizar"
       
       
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






