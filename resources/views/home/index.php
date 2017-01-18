<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<?php 

	function getInternationalizedDishType($dishType) {
		if ($dishType === "Main") {
			return "Основно";
		} else if ($dishType === "Soup") {
			return "Супа";
		} else if ($dishType === "Dessert") {
			return "Десерт";
		} else if ($dishType === "Salat") {
			return "Салата";
		}
	}

?>

<!-- home section -->
<section id="home" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-12 col-sm-12">
				<h1>FooDZone</h1>
				<h2>Поръчай бързо храна за вкъщи</h2>
				<a href="<?php echo URL::to('about_us'); ?>" class="smoothScroll btn btn-default">ПРОЧЕТИ ПОВЕЧЕ</a>
			</div>
		</div>
	</div>		
</section>

<!-- gallery section -->
<section id="gallery" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
				<h1 class="heading">Галерия</h1>
				<hr>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[0]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[0]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[0]->name; ?></h3>
					<span><?php echo $dishes[0]->name; ?> / <?php echo getInternationalizedDishType($dishes[0]->type); ?> / <?php echo $dishes[0]->price . 'лв.'; ?></span>
				</div>
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[1]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[1]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[1]->name; ?></h3>
					<span><?php echo $dishes[1]->name; ?> / <?php echo getInternationalizedDishType($dishes[1]->type); ?> / <?php echo $dishes[1]->price . 'лв.'; ?></span>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.6s">
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[2]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[2]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[2]->name; ?></h3>
					<span><?php echo $dishes[2]->name; ?> / <?php echo getInternationalizedDishType($dishes[2]->type); ?> / <?php echo $dishes[2]->price . 'лв.'; ?></span>
				</div>
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[3]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[3]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[3]->name; ?></h3>
					<span><?php echo $dishes[3]->name; ?> / <?php echo getInternationalizedDishType($dishes[3]->type); ?> / <?php echo $dishes[3]->price . 'лв.'; ?></span>
				</div>
			</div>
			<div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.9s">
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[4]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[4]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[4]->name; ?></h3>
					<span><?php echo $dishes[4]->name; ?> / <?php echo getInternationalizedDishType($dishes[4]->type); ?> / <?php echo $dishes[4]->price . 'лв.'; ?></span>
				</div>
				<a href="<?php echo URL::to('../resources/assets/images/' . $dishes[5]->image_name); ?>" data-lightbox-gallery="zenda-gallery"><img src="<?php echo URL::to('../resources/assets/images/' . $dishes[5]->image_name); ?>" alt="gallery img"></a>
				<div>
					<h3><?php echo $dishes[5]->name; ?></h3>
					<span><?php echo $dishes[5]->name; ?> / <?php echo getInternationalizedDishType($dishes[5]->type); ?> / <?php echo $dishes[5]->price . 'лв.'; ?></span>
				</div>
			</div>
		</div>
	</div>
</section>

<!-- contact section -->
<section id="contact" class="parallax-section">
	<div class="container">
		<div class="row">
			<div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
				<h1 class="heading">Contact Us</h1>
				<hr>
			</div>
			<div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
				<form action="#" method="post">
					<div class="col-md-6 col-sm-6">
						<input name="name" type="text" class="form-control" id="name" placeholder="Name">
				  </div>
					<div class="col-md-6 col-sm-6">
						<input name="email" type="email" class="form-control" id="email" placeholder="Email">
				  </div>
					<div class="col-md-12 col-sm-12">
						<textarea name="message" rows="8" class="form-control" id="message" placeholder="Message"></textarea>
					</div>
					<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
						<input name="submit" type="submit" class="form-control" id="submit" value="make a reservation">
					</div>
				</form>
			</div>
			<div class="col-md-2 col-sm-1"></div>
		</div>
	</div>
</section>

<?php include_once "/../partials/footer.php"; ?>