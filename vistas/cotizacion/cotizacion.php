
  
<!-- <page> <img style="height: 200px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://localhost/Proyecto%20Atlantis/img/header.png"> </page><br>

<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<div class="container section">

<table>
    <tr>
        <td style="width:242px;"></td>
        <td style="width:242px; text-align: Center; ">
            <h3> Cliente </h3>
        </td>
        <td style="width:242px;"></td>
    </tr>
    <tr>
        <td style="width:242px;"></td>
        <td style="width:242px; text-align: right">
        <h4>Señor: <br>Rol: </h4>
        </td>
        <td style="width:242px; text-align: center;  border: solid 1px #89B51D;">
        <h4><?php echo $_SESSION['nombre'];?><br><?php echo $_SESSION['rol'];?>
            </h4>
        </td>
    </tr>

    <tr>
        <td style="width:242px;"></td>
        <td style="width:242px; text-align: center">
        <h3> Su Cotización </h3>
        </td>
        <td style="width:242px;"></td>
    </tr>
</table>

<table style="border: 1px; right: 20px;">
    <tr>
        <td style="width:120px; text-align: center; border: solid 1px #89B51D;">
            <h3>Fecha de salida</h3>
        </td>
        <td
            style="width:170px; text-align: center; border-top: solid 1px #89B51D; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h3>Fecha de llegada</h3>
        </td>
        <td style="width:70px; text-align: center; border: solid 1px #89B51D;">
            <h3>Adultos</h3>
        </td>
        <td
            style="width:10px; text-align: center; border-top: solid 1px #89B51D; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h3>Menores</h3>
        </td>
        <td
            style="width:10px; text-align: center; border-top: solid 1px #89B51D; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h3>Costo</h3>
        </td>
    </tr>
    <?php foreach ($retornado as $imprime){ ?>
    <tr class="">
        <td
            style="width:170px; border-right: solid 1px #89B51D; border-left: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h4><?php echo $imprime->fecha_salida_coti;?></h4>
        </td>
        <td style="width:170px; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h4><?php echo $imprime->fecha_llegada_coti;?></h4>
        </td>
        <td
            style="width:170px; border-right: solid 1px #89B51D; border-left: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h4><?php echo $imprime->adultos_coti;?></h4>
        </td>
        <td style="width:170px; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h4><?php echo $imprime->menores_coti;?></h4>
        </td>
        <td style="width:170px; border-right: solid 1px #89B51D; border-bottom: solid 1px #89B51D;">
            <h4><?php echo $imprime->precio_coti;?></h4>
        </td>
    </tr>
    <?php } ?>
</table>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

</div>

<img style="width: 750px; height: 70px margin-bottom: 10px;"
        src="http://localhost/Proyecto%20Atlantis/img/pie.png" alt="Logo"> -->

        <body class="cuerpo">
<img style="height: 200px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://localhost/Proyecto%20Atlantis/img/header.png">
<div class="margenes">
<h3 ><em> Cotizacion </em></h3>
<?php foreach($retornado as $imprime){}?>
    <h4 text-align="center"><u>Detalle de la cotizacion:</u></h4>

                

    <label class="titulo">Fecha de Salida: </label><?php echo $imprime->fecha_salida_coti; ?><br>
    <label class="titulo">Fecha de Llegada: </label><?php echo $imprime->fecha_llegada_coti;?><br>
    <div class="titulo"><i class="">Adultos:</i> <?php echo $imprime->adultos_coti;?></div>
                <div class="titulo"><i class="">Menores:</i> <?php echo $imprime->menores_coti;?></div>
                <div class="titulo"><i class="">Precio de la Cotizacion:</i>
                    <?php echo $imprime->precio_coti;?></div>
    <div class="estiloDetalle">
    <h3 text-align="center"><em> Porque viajar en Atlantis Travel es saber viajar</em></h3>
    <h4 text-align="center"><em> 

    </em></h4></div>
    </div><br>
        <!-- <img id="logo" src="http://localhost/proyecto/img/LOGO.jpg"> -->
        <h4 text-align="left"><em>Contactanos: 3193137358</em></h4><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <img id="pie" style="height: 200px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://localhost/Proyecto%20Atlantis/img/pie.png">


      </body>  
<style>
.estiloDetalle{
    margin-top: 50px;
    border-radius: 10px;
    border-color: green;
    border: 2px;
    padding: 2px;

}
.margenes{
    margin: 20px;

}
#pie{
    margin-top: 0px;
    margin-bottom: 0px;
}
#logo{
   
width: 181px;
height: 181px;
margin-left: 280px;
margin-top: 116px;
margin-bottom: 0px;
}

.titulo{
    font-weight: bold;
    font-size: 15px;
}
</style>
