<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Изтриване на ястие</h1>
                <hr>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($errors) && count($errors) > 0) {
            			var_dump($errors);
            		} else if(isset($success)) {
            			var_dump($success);
            		} else {
	            		for($i = 0 ; $i < count($dishes) ; $i++) {
	            			?>
	            			
	            			<h1><?php echo $dishes[$i]->name; ?></h1>
	            			<form action="<?php URL::to('/dishes/deletion'); ?>" method="POST">
	            				<input type="hidden" name="id" value="<?php echo $dishes[$i]->id; ?>">
	            				<input type="submit" value="Изтрии">
	            			</form>
	            			<br>
	            			
	            			<?php 
	            		}
            			
            		}
            	
            	?>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>