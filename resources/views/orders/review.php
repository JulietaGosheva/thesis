<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<br><br><br>

<?php 

	function explodeIds($rawDishIds) {
		$ids = array();
		$dishIds = explode(',', $rawDishIds);
	
		foreach ($dishIds as $dishId) {
			preg_match('/(\d+){(\d+)}/', $dishId, $matches);
			$ids[$matches[1]] = $matches[2];
		}
	
		ksort($ids);
		
		return array_values($ids);
	}
?>
<section id="galery" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
		        <h1 class="heading">Списък с ястия</h1>
		    	<hr>
			</div>
		            
			<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s" style="margin-bottom: 150px;">
			<?php 
            	if (isset($errors) && count($errors) > 0) {
            		foreach ($errors as $error) { ?>
            			<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: center">
						  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong><?php echo $error; ?> Натиснете <a href="<?php echo URL::to('orders'); ?>">тук</a>, за да се върнето обратно.</strong> 
						</div>
            		<?php 
            		}
            	} else if (isset($success) && count($success) > 0) { ?>
            		<div class="alert alert-success alert-dismissible" role="alert" style="text-align: center">
					  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					  	<strong><?php echo $success; ?> Натиснете <a href="<?php echo URL::to('orders'); ?>">тук</a>, за да се върнето обратно.</strong> 
					</div>
            	<?php 
            	}
            	
				if (isset($orders)) { ?>
					<table class="table table-striped">
						<tr>
							<th>#</th>
							<th>Име</th>
							<th>Телефонен номер</th>
							<th>Адрес</th>
							<th>Поръчки</th>
							<th>Статус на поръчката</th>
						</tr>
				
					<?php 
						$i = 0;
						foreach ($orders as $order) {
							$user = $order->user;
							$dishes = $order->dishes->get(); ?>
							<tr>
								<td><?php echo ++$i; ?></td>
								<td><?php echo $user->firstname . ' ' . $user->lastname; ?></td>
								<td><?php echo $user->phone; ?></td>
								<td><?php echo $order->address; ?></td>
								<td>
									<?php 
										$dishIds = explodeIds($order->dish_ids);
										for ($i = 0 ; $i < count($dishes) ; $i++) {
											echo $dishes[$i]->name . " - поръчано $dishIds[$i] път/и.<br>";	
										}
									?>
								</td>
								<td align="center">
									<?php
									$isOrderProcessed = $order->processed === "true";

									if ($isOrderProcessed) { ?>
										<form method="POST" action="<?php echo URL::to('/process/order') . '/' . $order->id; ?>">
											<input type="hidden" name="_method" value="DELETE">
											<button class="btn btn-danger">
												Маркирай като необработена
											</button>
										</form>
									<?php
									} else { ?>
										<form method="POST" action="<?php echo URL::to('/process/order') . '/' . $order->id; ?>">
											<button class="btn btn-success">
												Маркирай като обработена
											</button>
										</form>
									<?php
									}
									?>
								</td>
							</tr>
						<?php
						}
						?>
					</table>
				<?php
				}	
				?>		
			</div>
		</div>
	</div>
</section>

<?php include_once "/../partials/footer.php"; ?>