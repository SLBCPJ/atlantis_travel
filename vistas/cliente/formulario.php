<?php require '../inc/header.php'; 
// error_reporting(0);
// $varsesion = $_SESSION['email'];
// if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) {
//         echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Usted no ha iniciado una sesión o no cuenta con los privilegios adecuados para realizar esta acción.</h2></div> </div></div></body> ' ;  
//     // exit();
// }
if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) {
   //header("location: ../controlador/UsuarioControlador.php?accion=login");
   
} 
?>


<div class="content mt-3">
  <div class="animated fadeIn">

    <div class="col-lg-12">
      <div class="card">
        <div class="card-header" style="text-align: center">
          <strong>FORMULARIO CLIENTE</strong>
        </div>
        <div class="card-body card-block">
          <form action="ClienteControlador.php" method="post" enctype="multipart/form-data" class="form-horizontal"
            id="validacion" novalidate>
            <div class="row form-group">

              <div class="col-12 col-md-6">
                <input type="hidden" name="accion" value="insertar">
                <label class=" form-control-label">Tipo de Identificacion</label>
                <select name="tipoid" id="tipoid" class="form-control" required>
                  <option value="">Seleccione</option>
                  <option value="CC">Cedula Cuidadania</option>
                  <option value="TI">Tarjeta de Identidad</option>
                  <option value="CE">Cedula Extranjera</option>
                  <option value="DNI">Documento Nacional de Identidad</option>
                </select>

              </div>
              <div class="col-12 col-md-6">
                <label class=" form-control-label">Numero de Identificacion</label>
                <input type="number" id="numeroid" name="numeroid" placeholder="Numero de Identificacion"
                  class="form-control" required>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Nombre (s)</label>
                <input type="text" id="nombre" name="nombre" onkeypress="return validar(event)" placeholder="Nombre (s)"
                  class="form-control" required>

              </div>
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Apellidos</label>
                <input type="text" id="apellido" name="apellido" placeholder="Apellidos" class="form-control" required>

              </div>
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Fecha de Nacimiento</label>
                <input type="date" id="fechanaci" name="fechanaci" placeholder="Fecha de Nacimiento"
                class="form-control " required>
                 
              </div>
              
            </div>
            <div class="row form-group">
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Telefono</label>
                <input type="number" id="telefono" name="telefono" placeholder="Telefono" class="form-control" required>

              </div>
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Celular</label>
                <input type="number" id="celular" name="celular" placeholder="Celular" class="form-control" required>

              </div>
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Direccion</label>
                <input type="text" id="direccion" name="direccion" placeholder="Direccion" class="form-control"
                  required>

              </div>
            </div>
            <div class="row form-group">
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Email</label>
                <input type="email" id="email" name="email" placeholder="Email" class="form-control" required>

              </div>
              <div class="col-12 col-md-4">
                <label class=" form-control-label">Contrasena</label>
                <input type="password" id="contrasena" name="contrasena" placeholder="Contrasena" class="form-control" required>
                <!-- <input type="hidden" name="rol" id="rol" value="Cliente"> -->
              </div>
              <div class="col-12 col-md-4">
                                <label class=" form-control-label">Confirmar Contraseña</label>
                                <input type="password" id="confiContrasena" name="confiContrasena" placeholder="Confirmar Contraseña"
                                    class="form-control" required>
                            </div>
                            </div>
                            <div class="row form-group">
              <div class="col-12 col-md-6">
                <label class=" form-control-label">Genero:</label>
                <select name="genero" id="genero" class="form-control" required>
                  <option value="">---Seleccione---</option>
                  <option value="Masculino">Masculino</option>
                  <option value="Femenino">Femenino</option>
                  <option value="Otro">Otro</option>
                </select>

              </div>
              <div class="col-12 col-md-6">
                <label class=" form-control-label">Estado Civil</label>
                <select name="estado" id="estado" class="form-control" required>
                  <option value="">---Seleccione---</option>
                  <option value="Soltero">Soltero/a</option>
                  <option value="Comprometido">Comprometido/a</option>
                  <option value="Casado">Casado/a</option>
                  <option value="Separado">Separado/a</option>
                  <option value="Viudo">Viudo/a</option>
                </select>

              </div>
            </div>
            <!-- <div class="row form-group">
                                <div class="col col-md-3"><label for="file-input"
                                        class=" form-control-label">File input</label></div>
                                <div class="col-12 col-md-9"><input type="file" id="file-input"
                                        name="file-input" class="form-control-file"></div>
                            </div> -->
            <div class="" style="text-align: center">
              <button type="submit" class="btn btn-primary btn-sm">
                <i class="fa fa-check-square-o"></i> Registrar
              </button>
              <button type="reset" class="btn btn-danger btn-sm">
                <i class="fa fa-ban"></i> Cancelar
              </button>
            </div>
          </form>
          <script>
//             		jQuery.validator.addMethod("fechanaci", function( value, element) 
// 		{
// 			var validator = this;
// 			var datePat = /^(\d{1,2})(\/|-)(\d{1,2})(\/|-)(\d{4})$/;
// 			var fechaCompleta = value.match(datePat);
// 			if (fechaCompleta == null) {

// 				return true;
// 			}

// 			dia = fechaCompleta[1];
// 			mes = fechaCompleta[3];
// 			anio = fechaCompleta[5];

// 			if (dia < 1 || dia > 31) {
// 				$.validator.messages.fecha = "El valor del día debe estar comprendido entre 1 y 31.";
// 				return false;
// 			}
// 			if (mes < 1 || mes > 12) { 
// 				$.validator.messages.fecha = "El valor del mes debe estar comprendido entre 1 y 12.";
// 				return false;
// 			}
// 			if ((mes==4 || mes==6 || mes==9 || mes==11) && dia==31) {
// 				$.validator.messages.fecha = "El mes "+mes+" no tiene 31 días!";
// 				return false;
// 			}
// 			if (mes == 2) { // bisiesto
// 				var bisiesto = (anio % 4 == 0 && (anio % 100 != 0 || anio % 400 == 0));
// 				if (dia > 29 || (dia==29 && !bisiesto)) {
// 					$.validator.messages.fecha = "Febrero del " + anio + " no contiene " + dia + " dias!";
// 					return false;
// 				}
// 			}
// 			return true;
// 		}, "Fecha invalida");


// jQuery.validator.addMethod("fechanaci", function(value, element) 
// {
  
//     var fechaActual = new Date();
//     var diaActual = fechaActual.getDate();
//     var mesActual = (fechaActual.getMonth() + 1);
//     var anioActual = fechaActual.getFullYear();
//     var validator = this;
//     var datePat = /^(\d{4})(\/|-)(\d{1,2})(\/|-)(\d{1,2})$/;
//     var fechaCompleta = value.match(datePat);
    
//     dia = fechaCompleta[5];
//     mes = fechaCompleta[3];
//     anio = fechaCompleta[1];
//     if(fechaCompleta == null){
//         $.validator.messages.fecha = "Fecha de nacimiento Invalida";
//         return false;
//     }
//     if(anio>anioActual){
//         $.validator.messages.fecha = "Fecha de nacimiento Invalida";
//         return false;
//     }
//     if(anio == anioActual && mes>mesActual){
//         $.validator.messages.fecha = "Fecha de nacimiento Invalida";
//         return false;
//     }
//     if(anio == anioActual && mes == mesActual && dia>diaActual){
//         $.validator.messages.fecha = "Fecha de nacimiento Invalida";
//         return false;
//     }
       

    
//     return true;
// });

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
                contrasena: {
                required: true,
                minlength: 4,
                maxlength: 8
            },
            confiContrasena: {
                required: true,
                equalTo: '#contrasena'
            },
                genero: 'required',
                estado: 'required'

              },

              messages: {
                tipoid: {
                  required: "Completa Este Campo",
                },
                numeroid: {
                  required: "Por Favor Numero de Identificación",
                  minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                  maxlength: "Maximos Digitos Permitidos: 10"
                },
                nombre: {
                  required: "Por Favor Ingrese Su Nombre",
                  lettersonly: "Por Favor Ingrese Solo Letras",
                  minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                  maxlength: "Maximos caracteres permitidos: 30"
                },
                apellido: {
                  required: "Por Favor Ingrese Su Apellido",
                  lettersonly: "Por Favor Ingrese Solo Letras",
                  minlength: jQuery.validator.format("al menos {0} caracteres son necesarios!"),
                  maxlength: "Maximos caracteres permitidos: 30"
                },
                fechanaci: "Por Favor Ingrese Fecha de Nacimiento",
                telefono: {
                  required: "Por Favor Ingrese Su Numero de Telefono",
                  digits: "No se admiten números negativos ni puntos",
                  number: "Por Favor Ingrese Un Numero Valido",
                  minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                  maxlength: "Maximos Digitos Permitidos: 10"
                },
                celular: {
                  required: "Por Favor Ingrese Su Numero de Telefono",
                  digits: "No se admiten números negativos ni puntos",
                  number: "Por Favor Ingrese Un Numero Valido",
                  minlength: jQuery.validator.format("Al Menos {0} Digitos Son Necesarios!"),
                  maxlength: "Maximos Digitos Permitidos: 10"
                },
                direccion: {
                  required: "Por Favor Ingrese Su Direccion",
                  minlength: jQuery.validator.format("Al Menos {0} Caracteres Son Necesarios!"),
                  maxlength: "Maximos caracteres permitidos: 30"
                },
                email: {
                  required: "Por Favor Ingrese Su Email",
                  email: "Recuerde que debe ser formato E-mail"
                },
                contrasena: {
                required: "Este valor no puede quedar en blanco",
                minlength: "La contraseña debe tener mas de 4 caracteres",
                maxlength: "La contraseña debe tener menos de 30 caracteres"
            },
            confiContrasena: {
                required: "Campo requerido",
                equalTo: "La contraseña no coincide"
            },
                genero: "Por Favor Elija Una Opcion",
                estado: "Por Favor Elija Una Opcion"


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
        </div>

      </div>

    </div>

  </div><!-- .animated -->
</div><!-- .content -->

</body>

</html>

<?php require '../inc/footer.php'; ?>