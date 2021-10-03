<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="en">
<!--<![endif]-->

<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Atlantis Travel</title>
    <meta name="description" content="Sufee Admin - HTML5 Admin Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="apple-icon.png">
  
    <link rel="shortcut icon" href="../img/logopes.ico">
 
    <link rel="stylesheet" href="../vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="../vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="../vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="../vendors/selectFX/css/cs-skin-elastic.css">
    <!-- <link rel="stylesheet" href="vendors/jqvmap/dist/jqvmap.min.css"> -->
    <link rel="stylesheet" href="../css/main.css">

    <link rel="stylesheet" href="../assets/css/style.css">
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../css/style.css">
    <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" type="text/css" /> -->
    <!-- <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'> -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <script src="../js/jquery.validate.js"></script>
    

</head>

<body>


    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu"
                    aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <?php if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) { ?>
                <a class="navbar-brand" href="../index.html" title="Ir a la pagina principal">
                    <h6>ATLANTIS TRAVEL</h6>
                </a>
                <?php } ?>
                <?php if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador" || $_SESSION['rol']=="Cliente")){ ?>
                <a class="navbar-brand" href="">
                    <h6>ATLANTIS TRAVEL</h6>
                </a>
                <?php } ?>
                <a class="navbar-brand hidden" ><img src="../img/logopes.ico" alt="Logo"></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a > <i class="menu-icon fa fa-plane"></i>"Viaja y Vive tus sueños" </a>
                    </li>
                    <h3 class="menu-title">Nuestro Contenido</h3><!-- /.menu-title -->
                    <li>
                        <a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaqueteControlador.php?accion=inicio"> <i class="menu-icon fa fa-camera"></i>Paquetes Turisticos </a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/HospedajeControlador.php?accion=inicio"> <i class="menu-icon ti-home"></i>Hospedajes</a>
                    </li>
                    <li>
                        <a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ServicioControlador.php?accion=inicio"> <i class="menu-icon ti-info"></i>Servicios</a>
                    </li>
               
                 
                    <!-- <h3 class="menu-title">UI elements</h3>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-laptop"></i>Components</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="fa fa-puzzle-piece"></i><a href="ui-buttons.html">Buttons</a></li>
                            <li><i class="fa fa-id-badge"></i><a href="ui-badges.html">Badges</a></li>
                            <li><i class="fa fa-bars"></i><a href="ui-tabs.html">Tabs</a></li>
                            <li><i class="fa fa-share-square-o"></i><a href="ui-social-buttons.html">Social Buttons</a>
                            </li>
                            <li><i class="fa fa-id-card-o"></i><a href="ui-cards.html">Cards</a></li>
                            <li><i class="fa fa-exclamation-triangle"></i><a href="ui-alerts.html">Alerts</a></li>
                            <li><i class="fa fa-spinner"></i><a href="ui-progressbar.html">Progress Bars</a></li>
                            <li><i class="fa fa-fire"></i><a href="ui-modals.html">Modals</a></li>
                            <li><i class="fa fa-book"></i><a href="ui-switches.html">Switches</a></li>
                            <li><i class="fa fa-th"></i><a href="ui-grids.html">Grids</a></li>
                            <li><i class="fa fa-file-word-o"></i><a href="ui-typgraphy.html">Typography</a></li>
                        </ul>
                    </li> -->

                    <?php if(isset($_SESSION['email']) && ($_SESSION['rol']=="Administrador")) { ?>
                    <h3 class="menu-title">Formularios</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon ti-list"></i>Formularios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <div class="" style="text-align: center">
                                <h6 class="" style="color: white">Clientes</h6>
                            </div>
                            <li><i class="menu-icon fa fa-users"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ClienteControlador.php?accion=insertar">Registrar
                                    </a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ClienteControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Usuarios</strong>
                            </div>
                            <li><i class="menu-icon fa fa-user"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=insertar">Registrar
                                    </a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Hospedajes</strong>
                            </div>
                            <li><i class="menu-icon fa fa-building-o"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/HospedajeControlador.php?accion=insertar">Registrar
                                    </a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/HospedajeControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Paquetes Turisticos</strong>
                            </div>
                            <li><i class="menu-icon fa fa-sun-o"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaqueteControlador.php?accion=insertar">Registrar</a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaqueteControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Transportes</strong>
                            </div>
                            <li><i class="ti-truck"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/TransporteControlador.php?accion=insertar">Registrar
                                    </a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/TransporteControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Ciudades</strong>
                            </div>
                            <li><i class="menu-icon ti-location-pin"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CiudadControlador.php?accion=insertar">Registrar
                                    Ciudad</a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CiudadControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Paises</strong>
                            </div>
                            <li><i class="ti-world"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaisControlador.php?accion=insertar">Registrar
                                    Pais</a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaisControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Servicios</strong>
                            </div>
                            <li><i class="menu-icon fa fa-phone"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ServicioControlador.php?accion=insertar">Registrar
                                    </a></li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ServicioControlador.php?accion=mostrar">Consultar</a>
                            </li>
                            <div role="separator" class="dropdown-divider"></div>
                            <div class="" style="text-align: center">
                                <strong class="" style="color: white">Cotizaciones</strong>
                            </div>
                            <li><i class="menu-icon fa fa-quote-left"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CotizacionControl.php?accion=insertar">Registrar</a>
                            </li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CotizacionControl.php?accion=mostrar">Consultar</a>
                            </li>
                        </ul>
                    </li>


                    <?php } ?>
                    <?php if(isset($_SESSION['email']) && ($_SESSION['rol']=="Cliente")) { ?>
                                  <h3 class="menu-title">Información</h3>
                                  <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-building-o"></i>Hospejajes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-search"></i><a   href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/HospedajeControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li> 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-plane"></i>Paquetes Turisticos</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-eye"></i><a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaqueteControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li> 
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-road"></i>Transportes</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-search"></i><a  href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/TransporteControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-cutlery"></i>Servicios</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-search"></i><a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ServicioControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon ti-location-pin" title="Ciudades"></i>Ciudades</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-search"></i><a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CiudadControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-globe" title="Paises"></i>Paises</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="ti-search"></i><a href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/PaisControlador.php?accion=mostrar">Consultar</a></li>
                            
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-calendar" title="Cotizaciones"></i>Cotizaciones</a>
                        <ul class="sub-menu children dropdown-menu">
                        <li><i class="menu-icon fa fa-quote-left"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CotizacionControl.php?accion=insertar">Registrar</a>
                            </li>
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/CotizacionControl.php?accion=mostrar">Consultar</a>
                            </li>
                            
                        </ul>
                    </li>
                    <h3 class="menu-title">Contenido</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon ti-list"></i>Formulario</a>
                        <ul class="sub-menu children dropdown-menu">
                            <div class="" style="text-align: center">
                            <strong class="" style="color: white">Clientes</strong>
                            </div>
                          
                            <li><i class="ti-search"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/ClienteControlador.php?accion=mostrar">Consultar</a>
                            </li>
                           
                           
                        </ul>
                    </li>


                    <?php } ?>
            
                    <!-- <li>
                        <a href="widgets.html"> <i class="menu-icon ti-email"></i>Widgets </a>
                    </li> -->
                    <!-- <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-bar-chart"></i>Charts</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-line-chart"></i><a href="charts-chartjs.html">Chart JS</a>
                            </li>
                            <li><i class="menu-icon fa fa-area-chart"></i><a href="charts-flot.html">Flot Chart</a></li>
                            <li><i class="menu-icon fa fa-pie-chart"></i><a href="charts-peity.html">Peity Chart</a>
                            </li>
                        </ul>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false"> <i class="menu-icon fa fa-area-chart"></i>Maps</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-map-o"></i><a href="maps-gmap.html">Google Maps</a></li>
                            <li><i class="menu-icon fa fa-street-view"></i><a href="maps-vector.html">Vector Maps</a>
                            </li>
                        </ul>
                    </li> -->
                
                    <?php if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) { ?>
                    <h3 class="menu-title">Unete a nosotros</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" title="Mi Cuenta"> <i class="menu-icon fa fa-user"></i>Mi Cuenta</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-sign-in"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=login">Iniciar
                                    Sesión</a></li>
                            <li><i class="menu-icon fa ti-id-badge"></i><a
                                    href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=insertar">Registrarse</a>
                            </li>

                        </ul>
                    </li>
                    <?php } ?>

                </ul>

            </div><!-- /.navbar-collapse -->
        </nav>
    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

    <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <!-- <button class="search-trigger"><i class="fa fa-search"></i></button> -->
                        <div class="form-inline">
                            <!-- <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form> -->
                        </div>

                        <!-- <div class="dropdown for-notification">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bell"></i>
                                <span class="count bg-danger">5</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="notification">
                                <p class="red">You have 3 Notification</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                            </div>
                        </div> -->

                        <!-- <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary">9</span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
                                <p class="red">You have 4 Mails</p>
                                <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                                <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            </div>
                        </div> -->
                    </div>
                </div>

                <div class="col-sm-5">
                
                    <div class="user-area dropdown float-right">
                    <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador" || $_SESSION['rol']=="Cliente")) { ?>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" title="Perfil de: <?php echo $_SESSION['nombre']; ?>">
                            <img class="user-avatar rounded-circle" src="../images/avatar.jpg" alt="User Avatar">
                        </a>
<?php } ?>
                        <div class="user-menu dropdown-menu">
                        <?php  if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador" || $_SESSION['rol']=="Cliente")) { ?>
                            <a class="nav-link" href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=inicio" ><i class="fa fa-user"></i> Perfil</a>
                            <a class="nav-link"
                                href="<?php echo RUTA_URL;?>proyecto_atlantis/controlador/UsuarioControlador.php?accion=logout"><i
                                    class="fa fa-power-off"></i> Cerrar Sesión</a>
                            <?php } ?>
                        </div>
                    </div>

                    <!-- <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown"  id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div> -->

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->