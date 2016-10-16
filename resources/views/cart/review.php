<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Количка</h1>
                <hr>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($orders)) {
	            		for($i = 0 ; $i < count($orders) ; $i++) {
	            			?>
	            			
	            			<h1><?php echo $orders[$i]; ?></h1><br>
	            			<form action="<?php echo URL::to('/removefromcart') . '/' . $orders[$i]; ?>" method="POST">
	            				<input type="hidden" name="id" value="<?php echo $orders[$i]; ?>">
	            				<input type="submit" value="Премахни от количката">
	            			</form>
	            			
	            			<?php 
	            		} ?>
	            		
            			<form action="<?php echo URL::to('/order'); ?>" method="POST">
	            			<?php for($i = 0 ; $i < count($orders) ; $i++) { ?>
            		            <input type="hidden" name="ids[]" value="<?php echo $orders[$i]; ?>">
							<?php } ?>
							<input type="text" name="address" placeholder="Вашият адрес">
                			<input type="submit" value="Поръчай">
            			</form>
            	<?php 
            		} else if (isset($errors)) {
            		}
            	?>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>