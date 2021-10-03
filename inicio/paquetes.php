<?php require '../inc/header.php'; ?>


<div class="content mt-3">

	<section class="destinations-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-40 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Destinos Populares </h1>
						<p>"Los viajes son como los atardeceres, si esperas demasiado de lo pierdes."</p>
					</div>
				</div>
			</div>


			<div class="row">
				<?php foreach ($mostrarpaquete as $mostrar) {?>
				<div class="col-lg-4">
					<div class="single-destinations">
						<div class="thumb">
							<img width="350" height="200" src="<?php echo $mostrar->foto_url_paqu; ?>" alt="">
						</div>
						<div class="details">
							<h4><?php echo $mostrar->nomb_paqu; ?></h4>
							<ul class="package-list">
								<li class="d-flex justify-content-between align-items-center">
									<span>Duración</span>
									<span><?php echo $mostrar->duracion_paqu; ?></span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<span>Fecha Salida</span>
									<span><?php echo $mostrar->fecha_paqu; ?></span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<span>Servicios</span>
									<span>Todo Incluido</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<span>Precio Por Persona</span>
									<span>$<?php echo $mostrar->prec_paqu; ?> COP</span>
								</li>
								<li class="d-flex justify-content-between align-items-center">
									<a onclick="ver(<?php echo $mostrar->id;?>)" class="price-btn" >Detalles</a>
									
								</li>
							</ul>
							
						</div>
						
					</div>
					
				</div>
				
				<?php } ?>
				
			</div>

		</div>


</div>

</section>


</div>

<script>
        function ver(id){
            var url = 'PaqueteControlador.php?accion=ver&id=' + id;
            location.href = url;
        }
</script>
</body>


<?php require '../inc/footer.php'; ?>

</html>