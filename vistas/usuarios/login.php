<?php 
?>
<!-- <link href="css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../js/bootstrap.min.js"></script> -->
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

<!DOCTYPE html>
<html>
<head>
	<title>Iniciar Sesión</title>

	<link rel="stylesheet" href="../css/bootstrap.min.css" >

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../css/estilos.css">
	<link rel="stylesheet" href="../css/styleinicio.css">
	<link rel="shortcut icon" href="../img/logopes.ico">
	<script src="../js/jquery-3.1.1.min.js"></script> 
    <script src="../js/jquery.validate.js"></script>
</head>
<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Iniciar sesión</h3>
				<!-- <div class="d-flex justify-content-end social_icon">
					<span><i class="fab fa-facebook-square"></i></span>
					<span><i class="fab fa-google-plus-square"></i></span>
					<span><i class="fab fa-twitter-square"></i></span>
				</div> -->
			</div>
			<div class="card-body">
				<form form action="UsuarioControlador.php" method="POST"  id="inicio">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="hidden" name="accion" value="login">
						<input type="email" class="form-control"  name="email" placeholder="E-mail" id="email" required>
						
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" name="password" class="form-control" placeholder="Contraseña" id="password" required>
					</div>
					<!-- <div class="row align-items-center remember">
						<input type="checkbox">Remember Me
					</div> -->
					<div class="form-group">
						<input type="submit" value="Ingresar" class="btn float-right login_btn">
					</div>
				</form>
			</div>
			<div class="card-footer">
				<div class="d-flex justify-content-center links"> 
				¿No tienes una cuenta?<a href="http://localhost/proyecto_atlantis/controlador/UsuarioControlador.php?accion=insertar">Regístrate</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">¿Olvidaste tu contraseña?</a>
				</div>
			</div>
		</div>
	</div>
</div>
</body>
</html>
<script>


  $("#inicio").validate({
    errorElement: "div",
    rules: {
        email: 'required',
		password:  'required'

    },

    messages: {
        email: "Ingrese un email para iniciar la sesión",
        password: "Ingrese la contraseña"
       
       
       
    }

  });
  (function () {
              'use strict';

              window.addEventListener('load', function () {
                var form = document.getElementById('inicio');
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



<?php ?>