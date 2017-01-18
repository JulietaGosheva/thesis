<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<br><br><br>

<section id="galery" class="parallax-section">
	<div class="container">
		<div class="row">

			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
		        <h1 class="heading">Списък с ястия</h1>
		    	<hr>
			</div>
		            
			<div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
				<table class="table table-striped">
					<tr>
						<th>#</th>
						<th>Име</th>
						<th>Телефонен номер</th>
						<th>Адрес</th>
						<th>Поръчки</th>
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
										foreach($dishes as $dish) {
											echo "$dish->name<br>";	
										}
									?>
								</td>
							</tr>
						<?php
						}
					?>		
				</table>
				
			</div>
		</div>
	</div>
</section>

<?php include_once "/../partials/footer.php"; ?>