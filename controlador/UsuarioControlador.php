<?php
require '../modelo/Usuario.php';
require '../config/conexion.php';
require_once 'IniciadorControlador.php';
$instanciar = new Iniciador();
class UsuarioControlador extends Usuario{

    public function __construct(){}
    public function recibirlogin($email,$contrasena){
            $this->email_usua = $email;
            $loginobjecto = $this->mostrarlogin();
              if ($loginobjecto) {
                foreach ($loginobjecto as $l){}
                if (password_verify($contrasena, $l->contrasena_usua) && $email==$l->email_usua) {
                    //echo 'Contraseña Correcta Puede Ingresar!';
                    $_SESSION['email'] = $l->email_usua;
                    $_SESSION['nombre'] = $l->nombre_usua;
                    $_SESSION['rol'] = $l->rol;
                
                   $this->redireccionarlogin();
                }
                else {
                    echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">Contraseña Incorrecta.</h2></div> <a class="ui inverted green button"
                    href="../controlador/UsuarioControlador.php?accion=login"><i
                      class="user circle icon"></i>Regresar</a> </div></div></body> ' ; 
                    // echo "Contraseña Incorrecta";
                }   
        }
        else {
            echo '<body> <style> h1 {color: red }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="error" style="text-align: center">¡Error!</h1></p> <h2 style="text-align: center">El usuario no existe en la base de datos.</h2></div> </div></div><a class="ui inverted green button"
            href="../controlador/UsuarioControlador.php?accion=login"><i
              class="user circle icon"></i>Regresar</a> </body> ' ; 
                    // echo "El usuario no existe en la base de datos";
        }
    
    }
    
    public function login(){
        // $_SESSION['prueba']="Esto es una prueba";
        require_once '../vistas/usuarios/login.php';
    }
    public function logout(){
        session_destroy();
        require_once '../vistas/usuarios/login.php';
        // require '../inicio/index.php';
    }
    public function inicio(){
        require_once '../vistas/usuarios/inicio.php';
    }
    public function verificacioninsertar($nombre,$email,$rol,$contrasena){
        //Espacio para validar la informacion en general
        $this->nombre = $nombre;
        $this->email = $email;
        $this->rol = $rol;
        $this->contrasena = $contrasena;
        $this->insertar();
        
        echo '<body> <style> h1 {color: green }</style> <div id="fondo" > <div id="contenedor1"> <div id="texto" > <p><h1 id="exito" style="text-align: center">¡Exito!</h1></p> <h2 style="text-align: center">Usuario registrado correctamente puede ingresar.</h2></div><a class="ui inverted green button"
        href="../controlador/UsuarioControlador.php?accion=login"><i
          class="user circle icon"></i>Ingresar</a> </div></div></body> '; 
          //if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")) { 

              //$this->redireccionarmostrar();
            
    }
    public function verificacioneliminar($id){
       $this->id = $id;
       $this->eliminar();
       $this->redireccionarmostrar();
    }
    public function verificacionmostrar(){
        // echo "Estamos llegando a la funcion Mostrar";
        $objetoretornado = $this->mostrar();
        $_SESSION['prueba']="Esto es una prueba";
        require '../vistas/usuarios/mostrar.php';
    }
    public function insertarusuarios(){
        // echo "Estamos llegando a la funcion Insertar";
        require '../vistas/usuarios/formulario.php';
    }
    public function verificacionactualizar($id){
        $this->id = $id;
        $objetoretornado = $this->actualizar();
       
        require '../vistas/usuarios/actualizar.php';
    }
    public function perfil($id){
        $this->id = $id;
        $perfil = $this->verperfil();
        require_once '../vistas/usuarios/verperfil.php';
    }
    public function verificacionactualizarinsertar($id,$nombre,$email,$rol,$contrasena){
        $this->id = $id;
        $this->nombre_usua = $nombre;
        $this->email_usua = $email;
        $this->rol = $rol;
        $this->contrasena_usua = $contrasena;
        $this->actualizarinsertar();
        $this->redireccionarmostrar();
    }
    // public function redireccionar(){
    //     header("location: ../vistas/usuarios/inicio.php");
    // }
    public function redireccionarlogin(){
        header("location: UsuarioControlador.php?accion=inicio");
    }
    public function redireccionarmostrar(){
        header("location: UsuarioControlador.php?accion=mostrar");
}
}





if(isset($_GET['accion'])&&$_GET['accion']=="inicio") {
    $instanciacontrolador = new UsuarioControlador();
    $instanciacontrolador->inicio();
}
 if(isset($_GET['accion'])&&$_GET['accion']=="logout") {
    $instanciacontrolador = new UsuarioControlador();
    $instanciacontrolador->logout();
}
if (isset($_SESSION['email']) == null || ($_SESSION['email'] = '')) { 
    if(isset($_GET['accion'])&&$_GET['accion']=="login") {
        $instanciacontrolador = new UsuarioControlador();
        $instanciacontrolador->login();
    }
    if(isset($_POST['accion']) && $_POST['accion']=="login") {
        if(isset($_POST['email'])&&isset($_POST['password'])){
            //  echo "hello world";
             $instanciacontrolador = new UsuarioControlador();
             $instanciacontrolador->recibirlogin($_POST['email'],$_POST['password']);
        }
        else {
            echo "no llego la informacion";
        }
    }

} 
 
       if (isset($_GET['accion'])&&$_GET['accion']=="insertar") {
        $instanciacontrolador = new UsuarioControlador();
        $instanciacontrolador->insertarusuarios();
    }
    if (isset($_POST['accion']) && $_POST['accion']=="insertar") { //El isset es para verificar si la variable esta llegando la informacion vacia o no
        if(isset($_POST['nombre'])&&isset($_POST['email'])&&isset($_POST['rol'])&&isset($_POST['contrasena'])){
            $instanciacontrolador = new UsuarioControlador();
            $instanciacontrolador->verificacioninsertar($_POST['nombre'],$_POST['email'],$_POST['rol'],$_POST['contrasena']);  
        }
    else {
        echo "Falto la Informacion por Llegar";
    }
}
    // else{
    //     echo "Usted no envio la informacion desde registrar"; esto es una prueba para ver si esta llegando la funcion
    // }
if (isset($_SESSION['email']) && ($_SESSION['rol'] == "Administrador")){ 
    if (isset($_GET['accion']) && $_GET['accion']=="mostrar") {
        $instanciacontrolador = new UsuarioControlador();
        $instanciacontrolador->verificacionmostrar();
    }
    
    if (isset($_GET['accion']) && $_GET['accion']=="eliminar") {
        $instanciacontrolador = new UsuarioControlador();
        $id = $_GET['id'];
        $instanciacontrolador->verificacioneliminar($id);
    }
    if (isset($_GET['accion']) && $_GET['accion']=='perfil') {
        $instanciacontrolador = new UsuarioControlador();
        $id = $_GET['id'];
        $instanciacontrolador->perfil($id);
    }
    
        if (isset($_GET['accion']) && $_GET['accion']=='actualizar') {
            $instanciacontrolador = new UsuarioControlador();
            $id = $_GET['id'];
            $instanciacontrolador->verificacionactualizar($id);
        }
        
        if (isset($_POST['accion']) && $_POST['accion']=='actualizar') {
            if (isset($_POST['id'])&&isset($_POST['nombre'])&&isset($_POST['email'])&&isset($_POST['rol'])&&isset($_POST['contrasena'])) {
                $instanciacontrolador = new UsuarioControlador();
                $instanciacontrolador->verificacionactualizarinsertar($_POST['id'],$_POST['nombre'],$_POST['email'],$_POST['rol'],$_POST['contrasena']);
            }
            else {
                echo "Error al enviar la informacion";
            }
        }
    }
    

?>