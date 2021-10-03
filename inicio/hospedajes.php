<?php require '../inc/header.php'; ?>


<div class="content mt-3">

<section class="destinations-area section-gap">
				<div class="container">
		            <div class="row d-flex justify-content-center">
		                <div class="menu-content pb-40 col-lg-8">
		                    <div class="title text-center">
		                        <h1 class="mb-10">Hospedajes</h1>
		                        <p>Encuentra los hospedajes registrados en nuestra empresa a un precio comodo y justo.</p>
		                    </div>
		                </div>
		            </div>						
					<div class="row">
          <?php foreach ($mostrarhospedaje as $mostrar) {?>
						<div class="col-lg-4">
							<div class="single-destinations">
								<div class="thumb">
									<img width="200" height="200" src="<?php echo $mostrar->foto_url_hosp; ?>" alt="">
								</div>
								<div class="details">
									<h4 class="d-flex justify-content-between">
										<span><?php echo $mostrar->nombre_hosp; ?></span>                              	
										<div class="star"><?php echo $mostrar->estrellas_hosp	; ?>
											<span class="fa fa-star checked"></span>
											
										</div>	
									</h4>
									<ul class="package-list">
										<li class="d-flex justify-content-between align-items-center">
											<span>Piscina</span>
											<span><?php echo $mostrar->piscina_hosp; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Wi-fi</span>
											<span><?php echo $mostrar->wifi_hosp; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Parqueadero</span>
											<span><?php echo $mostrar->parqueadero_hosp; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Aire Acondicionado</span>
											<span><?php echo $mostrar->aire_acondicionado_hosp; ?></span>
										</li>
										<li class="d-flex justify-content-between align-items-center">
											<span>Precio por Noche</span>
											<span>$<?php echo $mostrar->precio_hosp; ?> COP</span>
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
      </section>  
</div>
			<!-- End destinations Area -->
			<script>
        function ver(id){
            var url = 'HospedajeControlador.php?accion=ver&id=' + id;
            location.href = url;
        }
</script>
  </body>


  <?php require '../inc/footer.php'; ?>

  </html>