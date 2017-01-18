<?php
	if(isset($dish) === false) {
		include_once "/../partials/header.php"; 
	} 
?>
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
				        	<a class="btn btn-success" style="min-width: 100%;" href="<?php echo URL::to('/dishes/edit') . '/' . $dishes[$i]->id; ?>" target="_blank">
            					Редактирай
            				</a>
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
                <h1 class="heading">Редактиране на ястия</h1>
                <hr>
            </div>
            
            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($dishes)) {
            			
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
            		
            		} else if (isset($dish)) { ?>
            		
	            		<form class="col-sm-offset-3 col-sm-6" action="<?php echo URL::to('dishes/edit'); ?>" method="POST" enctype="multipart/form-data">
	            			<input type="hidden" name="id" value="<?php echo $dish->id; ?>">
		            		<div class="form-group">
		            			<label>Име : </label>
		                        <input name="name" type="text" class="form-control" value="<?php echo $dish->name; ?>" placeholder="Име">
		                    </div>
		                    <div class="form-group">
		                    	<label>Грамаж : </label>
		                        <input name="weight" type="text" class="form-control" value="<?php echo $dish->weight; ?>" placeholder="Грамаж">
		                    </div>
		                    <div class="form-group">
		                    	<label>Описание : </label>
		                        <input name="description" type="text" class="form-control" value="<?php echo $dish->description; ?>" placeholder="Описание">
		                    </div>
		                    <div class="form-group">
		                    	<label>Цена : </label>
			            		<input type="text" name="price" class="form-control" value="<?php echo $dish->price; ?>" placeholder="Цена">
		                    </div>
		                    <div class="form-group">
		                    	<label>Тип : </label>
			            		<select name="type" class="form-control">
			            			<option value="Soup" <?php if ($dish->type === "Soup") { echo "selected"; } ?>>Супа</option>
			            			<option value="Main" <?php if ($dish->type === "Main") { echo "selected"; } ?>>Основно</option>
			            			<option value="Dessert" <?php if ($dish->type === "Dessert") { echo "selected"; } ?>>Десерт</option>
			            			<option value="Salat" <?php if ($dish->type === "Salat") { echo "selected"; } ?>>Салата</option>
			            		</select>
		                    </div>
		                    <div class="form-group">
		            			<input type="file" name="file">
		            		</div>
		                    <div>
			            		<input type="submit" class="btn btn-primary form-control" value="Редактирай">
		                    </div>
	            		</form>
            		
				<?php            				
            		} else if (isset($errors) && count($errors) > 0) {
            			var_dump($errors);
            		}
            	?>
            </div>
        </div>
    </div>
</section>
 
<?php include_once "/../partials/footer.php"; ?>