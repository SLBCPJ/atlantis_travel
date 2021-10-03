<?php
class Iniciador{
    public function __construct(){
        session_set_cookie_params(0);
        session_start();
        define("RUTA_URL","http://localhost/");
    }
}


?>