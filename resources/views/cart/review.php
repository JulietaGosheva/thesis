<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<script>

	function onRemoveFromCartButtonClicked(oElement) {
		var endpointURL = $(oElement).data("removefromcartendpoint");
		
		$.ajax({
			url: endpointURL,
			method: "POST",
			success: function() {
				document.location = document.location + "?deletion=success";
			},
			error: function(oResponse, sStatus, sMessage) {
				alert("Не успяхме да изтрием поискания от вас елемент, моля да ни извините.");
			}
		});
	}
	
</script>

<?php 

	function listDishes($dishes) {
		for($i = 0 ; $i < count($dishes) ; $i++) { ?>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 50px;">
				<div class="thumbnail" style="min-height: 450px; max-height: 450px;">
			      	<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[$i]->image_name); ?>" data-lightbox-gallery="zenda-gallery">
						<img class="img-circle" src="<?php echo URL::to('../resources/assets/images/' . $dishes[$i]->image_name); ?>" style="max-height: 200px; min-height: 200px;"></img>
					</a>
			      	<div class="caption" style="min-height: 200px; width: 100%;">
			        	<h3 style="text-align: center"><?php echo $dishes[$i]->name; ?></h3>
						<p style="margin-bottom: 0px;">Цена: <b><?php echo $dishes[$i]->price; ?> лв.</b></p>
						<p style="margin-bottom: 0px;">Грамаж: <b><?php echo $dishes[$i]->weight; ?></b> гр.</p>
			        	
			        	<input type="hidden" name="ids[]" value="<?php echo $dishes[$i]->id; ?>">
			        	
			        	<table style="width: 100%">
			        		<tr>
			        			<td style="float: left; width: auto; font-size: 16px; line-height: 28px; color: #848484;">Количество: </td>
			        			<td style="widht: auto"><input type="number" min="1" value="1" name="quantities[]" class="form-control"></td>
			        		</tr>
			        	</table>

			        	<p style="text-overflow: ellipsis;">Описание: <?php echo $dishes[$i]->description; ?></p>

            			<a class="btn btn-danger" onclick="onRemoveFromCartButtonClicked(this)" data-removeFromCartEndpoint="<?php echo URL::to('/removefromcart') . '/' . $dishes[$i]->id; ?>" style="min-width: 100%;">Премахни от количката</a>
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
            <?php
            if (isset($errors) && count($errors) > 0) {
                foreach ($errors as $error) { ?>
            	   	<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: center">
            			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            			<strong><?php echo $error; ?></strong> 
            		</div>
            	<?php 
            	}
            }
            
            if (isset($_GET['deletion']) && $_GET['deletion'] === "success") { ?>
                <div class="alert alert-success alert-dismissible" role="alert" style="text-align: center">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                	<strong>Успешно премахнахте ястието от количката</strong> 
            	</div>
            <?php 
			} else if (isset($_GET['ordering']) && $_GET['ordering'] === "success") { ?>
				<div class="alert alert-success alert-dismissible" role="alert" style="text-align: center">
                	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <strong>Поръчката беше направена успешно</strong> 
                </div>
            <?php 
            } else if (isset($orders) && empty($orders) === false) { ?>
	            
	            <form action="<?php echo URL::to('/order'); ?>" method="POST">
		            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
		                <h1 class="heading">Количка</h1>
		                <hr>
		            </div>
		            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
					
					<?php 
	            		$dishes = $orders;
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
	
						if(!empty($soups)) { ?>
					   	
						   	<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
							   <br />
							   <h1 class="heading">Супи</h1>
							   <hr>
					       	</div>
								
					 		<?php
							listDishes($soups);
						}
			
						if(!empty($mains)) { ?>
			
							<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
								<h1 class="heading">Основни</h1>
								<hr>
							</div>
			
							<?php
							listDishes($mains);
						}
			
						if(!empty($desserts)) { ?>
							
							<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
								<h1 class="heading">Десерти</h1>
								<hr>
							</div>
							
							<?php
							listDishes($desserts);
						}
						
						if(!empty($salats)) { ?>
			
							<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
								<h1 class="heading">Салати</h1>
								<hr>
							</div>
			
							<?php
							listDishes($salats);
						}?>
		
						<div class="form-group col-md-offset-2 col-md-8" align="center">
	            			<label style="font-size:20px;">Адрес:</label>
	                        <input name="address" style="width:60%;" type="text" class="form-control" placeholder="Адрес">
							<br>
							<input class="btn btn-success" style="width:25%;"  type="submit" value="Поръчай">
						</div>
					</form>
	            </div>
            <?php 
			} else if (isset($errors) && count($errors) > 0) {
            	var_dump($errors);
            } else { ?>
            	<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
	                <h1 class="heading">Няма елементи в количката</h1>
	                <hr>
	            </div>
            <?php 
            }
           	?>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>