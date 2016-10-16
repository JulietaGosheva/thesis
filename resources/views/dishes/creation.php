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
            		if (isset($errors) && count($errors) > 0) {
            			var_dump($errors);
            		}
            	?>
            	<form action="<?php echo URL::to('dishes/creation'); ?>" method="POST" enctype="multipart/form-data">
            		<input type="text" name="name" placeholder="Име">
            		<input type="text" name="weight" placeholder="Грамаж">
            		<input type="text" name="description" placeholder="Описание">
            		<input type="file" name="file">
            		<input type="text" name="price" placeholder="Цена">
            		<select name="type">
            			<option value="Soup">Супа</option>
            			<option value="Main">Основно</option>
            			<option value="Dessert">Десерт</option>
            			<option value="Salat">Салата</option>
            		</select>
            		<input type="submit" value="Създай">
            	</form>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>