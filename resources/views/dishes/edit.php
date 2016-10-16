<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Ястия</h1>
                <hr>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($dishes)) {
	            		for($i = 0 ; $i < count($dishes) ; $i++) {
	            			?>
	            			
	            			<h1><?php echo $dishes[$i]->name; ?></h1>
	            			<a href="<?php echo URL::to('/dishes/edit') . '/' . $dishes[$i]->id; ?>" target="_blank">
	            				<?php echo URL::to('/dishes/edit') . '/' . $dishes[$i]->id; ?>
	            			</a>
	            			<br>
	            			
	            			<?php 
	            		}
            		} else if (isset($dish)) { ?>
						<form action="<?php echo URL::to('dishes/edit'); ?>" method="POST" enctype="multipart/form-data">
							<input type="hidden" name="id" value="<?php echo $dish->id; ?>">
		            		<input type="text" name="name" placeholder="Име" value="<?php echo $dish->name; ?>">
		            		<input type="text" name="weight" placeholder="Грамаж" value="<?php echo $dish->weight; ?>">
		            		<input type="text" name="description" placeholder="Описание" value="<?php echo $dish->description; ?>">
		            		<input type="file" name="file">
		            		<input type="text" name="price" placeholder="Цена" value="<?php echo $dish->price; ?>">
		            		<select name="type">
		            			<option value="Soup" <?php if ($dish->type === "Soup") { echo "selected"; } ?>>Супа</option>
		            			<option value="Main" <?php if ($dish->type === "Main") { echo "selected"; } ?>>Основно</option>
		            			<option value="Dessert" <?php if ($dish->type === "Dessert") { echo "selected"; } ?>>Десерт</option>
		            			<option value="Salat" <?php if ($dish->type === "Salat") { echo "selected"; } ?>>Салата</option>
		            		</select>
		            		<input type="submit" value="Редактирай">
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