<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<?php 

	function listDishes($dishes) {
		for($i = 0 ; $i < count($dishes) ; $i++) { ?>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 50px;">
				<div class="thumbnail" style="min-height: 400px; max-height: 400px;">
			      	<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[$i]->image_name); ?>" data-lightbox-gallery="zenda-gallery">
						<img class="img-circle" src="<?php echo URL::to('../resources/assets/images/' . $dishes[$i]->image_name); ?>" style="max-height: 200px; min-height: 200px;"></img>
					</a>
			      	<div class="caption" style="min-height: 200px;">
			        	<h3 style="text-align: center"><?php echo $dishes[$i]->name; ?></h3>
			        	<p style="text-overflow: ellipsis;"><?php echo $dishes[$i]->description; ?></p>
			      
			        	<div style="position: absolute; bottom: 0px; min-width: 95%;">
				        	<form action="<?php URL::to('/dishes/deletion'); ?>" method="POST">
	            				<input type="hidden" name="id" value="<?php echo $dishes[$i]->id; ?>">
	            				<input style="min-width: 100%" class="btn btn-danger" type="submit" value="Изтрии">
	            			</form>
			        	</div>
			      	</div>
			    </div>
			</div>
		<?php 
        }		
	}

?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Изтриване на ястие</h1>
                <hr>
            </div>
            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($errors) && count($errors) > 0) {
            			var_dump($errors);
            		} else if(isset($success)) {
            			var_dump($success);
            		} else {
            			$mains = array();
            			$soups = array();
            			$desserts = array();
            			$salats = array();
            			
            			foreach ($dishes as $dish) {
            				if ($dish->type === "Main") {
            					array_push($mains, $dish);
            				} else if ($dish->type === "Soup") {
            					array_push($soups, $dish);
            				} else if ($dish->type === "Dessert") {
            					array_push($desserts, $dish);
            				} else if ($dish->type === "Salat") {
            					array_push($salats, $dish);
            				}
            			}
            			?>
            			            			            			
            			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
            				<h1 class="heading">Супи</h1>
            			    <hr>
            			</div>
            			            			            			
            			<?php
            			            			            			
            			listDishes($soups);
            			            			
            			?>
            			            			            			            			
            			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
            				<h1 class="heading">Основни</h1>
            			    <hr>
            			</div>
            			            			            			
            			<?php
            			            			            			
            			listDishes($mains);
            			            			            			
            			?>
            			            			            			            			            			
            			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
            				<h1 class="heading">Десерти</h1>
            			    <hr>
            			</div>
            			            			            			    
            			<?php
            			            			            			
            			listDishes($desserts);
            			            			            			
            			?>
            			            			            			            			            			
            			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
            				<h1 class="heading">Салати</h1>
            			    <hr>
            			</div>
            			            			            			     
            			<?php
            			            			            			 
            			listDishes($salats);
            			            		
            		}
            	
            	?>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>