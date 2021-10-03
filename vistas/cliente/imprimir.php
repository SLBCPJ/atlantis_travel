<?php
require 'C:\xampp\htdocs\sufee-master 1\vendor\autoload.php'; //cargar el archivo autoload

use Spipu\Html2Pdf\Html2Pdf; //use para llamar a la libreria
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;
try {
    ob_start(); //creamos un objeto temporal
    include 'cotizacion.php';
    $content = ob_get_clean(); //el archivo se guardar en la variable
    $html2pdf = new Html2Pdf('P', 'A4', 'es');
  
    $html2pdf->setDefaultFont('Arial');
   
    $html2pdf->writeHTML($content); //lo guardamos en una variable $content
    ob_end_clean();
    $html2pdf->output('clientes.pdf'); //enviar el nombre del pdf
} catch (Html2PdfException $e) {
    $html2pdf->clean();
    $formatter = new ExceptionFormatter($e);
    echo $formatter->getHtmlMessage();
}

// $html2pdf = new Html2Pdf('L', 'A4', 'es', true, 'UTF-8', array(5,5,5,8)); //crear instancia de html2pdf
// $html2pdf->writeHTML('<h1>HelloWorld</h1>This is my first test');
// $html2pdf->output(); //hacer el pdf

?>

