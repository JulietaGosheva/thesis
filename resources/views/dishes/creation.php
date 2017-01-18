<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Създавабе на ястия</h1>
                <hr>
            </div>
            <div class="col-md-12 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
            	<?php 
            		if (isset($errors) && count($errors) > 0) {
            			var_dump($errors);
            		}
            	?>
            	<form class="col-sm-offset-3 col-sm-6" action="<?php echo URL::to('dishes/creation'); ?>" method="POST" enctype="multipart/form-data">
            		<div class="form-group">
            			<label>Име : </label>
                        <input name="name" type="text" class="form-control" placeholder="Име">
                    </div>
                    <div class="form-group">
                    	<label>Грамаж : </label>
                        <input name="weight" type="text" class="form-control" placeholder="Грамаж">
                    </div>
                    <div class="form-group">
                    	<label>Описание : </label>
                        <input name="description" type="text" class="form-control" placeholder="Описание">
                    </div>
                    <div class="form-group">
                    	<label>Цена : </label>
	            		<input type="text" name="price" class="form-control" placeholder="Цена">
                    </div>
                    <div class="form-group">
                    	<label>Тип : </label>
	            		<select name="type" class="form-control">
	            			<option value="Soup">Супа</option>
	            			<option value="Main">Основно</option>
	            			<option value="Dessert">Десерт</option>
	            			<option value="Salat">Салата</option>
	            		</select>
                    </div>
                    <div class="form-group">
            			<input type="file" name="file">
            		</div>
                    <div>
	            		<input type="submit" class="btn btn-primary form-control" value="Създай">
                    </div>
            	</form>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>