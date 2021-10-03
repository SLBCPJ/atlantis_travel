<!-- <page> <img style="height: 200px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://atlantistravel.atwebpages.com/proyecto_atlantis/img/header.png"> </page><br>

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
        <td style="width:242px;"></td> -->
        <!-- <td style="width:242px; text-align: left; ">
            <h3> Datos  </h3>
        </td> -->
        <!-- <td style="width:242px;"></td>
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
    </tr> -->

    <!-- <tr>
        <td style="width:242px;"></td>
        <td style="width:242px; text-align: center">
        <h3> Informacion del Cliente </h3>
        </td>
        <td style="width:242px;"></td>
    </tr>
</table> -->

    <!-- <?php foreach ($retornado as $imprime){ ?>
		<h4>Nombre Completo: <?php echo $imprime->nomb_clie?>   <?php echo $imprime->apell_clie ?></h4>
<h4>TIPO DOCUMENTO: <?php echo $imprime->tipo_iden_clie ?></h4>
<h4>NUMERO DOCUMENTO: <?php echo $imprime->nume_id_clie?></h4>
<h4>FECHA NACIMIENTO: <?php echo $imprime->fecha_naci_clie?></h4>
<h4>ESTADO CIVIL: <?php echo $imprime->estado_civil_clie?></h4>
<h4>TELEFONO: <?php echo $imprime->tele_clie?></h4>
<h4>CELULAR: <?php echo $imprime->celu_clie?></h4>
<h4>EMAIL: <?php echo $imprime->email_clie?></h4>
<h4>DIRECCION: <?php echo $imprime->dire_clie?></h4>
<h4>GENERO: <?php echo $imprime->genero_clie?></h4>
	<?php } ?> -->



<!-- </div><br><br><br> -->

    <!-- <img style="width: 750px; height: 70px margin-bottom: 10px;"
        src="http://atlantistravel.atwebpages.com/proyecto_atlantis/img/pie.png" alt="Logo"> -->

        <body class="cuerpo">
<img style="height: 200px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://localhost/Proyecto%20Atlantis/img/header.png">
<div class="margenes">
    <div class="estiloDetalle">
    <h3 text-align="center"><em>  Informacion del Cliente</em></h3>
    <h4 text-align="center"><em>  <?php foreach ($retornado as $imprime){ ?>
		<h4>Nombre Completo: <?php echo $imprime->nomb_clie?>   <?php echo $imprime->apell_clie ?></h4>
<h4>TIPO DOCUMENTO: <?php echo $imprime->tipo_iden_clie ?></h4>
<h4>NUMERO DOCUMENTO: <?php echo $imprime->nume_id_clie?></h4>
<h4>FECHA NACIMIENTO: <?php echo $imprime->fecha_naci_clie?></h4>
<h4>ESTADO CIVIL: <?php echo $imprime->estado_civil_clie?></h4>
<h4>TELEFONO: <?php echo $imprime->tele_clie?></h4>
<h4>CELULAR: <?php echo $imprime->celu_clie?></h4>
<h4>EMAIL: <?php echo $imprime->email_clie?></h4>
<h4>DIRECCION: <?php echo $imprime->dire_clie?></h4>
<h4>GENERO: <?php echo $imprime->genero_clie?></h4>
	<?php } ?>


    </em></h4></div>
    </div>
        <!-- <img id="logo" src="http://localhost/proyecto/img/LOGO.jpg"> -->
        <img id="pie" style="height: 180px; width: 800px; margin-top: 0px; margin-left: 0px;" src="http://localhost/Proyecto%20Atlantis/img/pie.png">

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

