<?php require '../inc/header.php'; ?>


<div class="content mt-3">

	<section class="destinations-area section-gap">
		<div class="container">
			<div class="row d-flex justify-content-center">
				<div class="menu-content pb-40 col-lg-8">
					<div class="title text-center">
						<h1 class="mb-10">Servicios</h1>
						<p>Estos son algunos de nuestros servicios que puedes encontrar.</p>
					</div>
				</div>
			</div>
			<div class="row">
				<?php foreach ($mostrarservicios as $mostrar) {?>
				<div class="col-lg-4">
					<div class="single-destinations">
						
						<div class="details text-center">
							<h4 class="d-flex justify-content-between">
								<span><?php echo $mostrar->nombre_serv; ?></span>
							</h4>
							<p><?php echo $mostrar->descripcion_serv; ?></p>
							<li class="d-flex justify-content-between align-items-center">
										<a onclick="ver(<?php echo $mostrar->id;?>)" class="price-btn" >Detalles</a>
							</li>	
						</div>
					</div>
				</div>
				<?php } ?>
			</div>


		</div>
	</section>
</div>

<script>
        function ver(id){
            var url = 'ServicioControlador.php?accion=ver&id=' + id;
            location.href = url;
        }
</script>
</body>


<?php require '../inc/footer.php'; ?>

</html>