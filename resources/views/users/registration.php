<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Регистрация</h1>
                <hr>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
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
            	?>
            	<form action="<?php echo URL::to('/users/registration'); ?>" method="POST">
            		<input type="email" name="email" placeholder="Емайл">
            		<input type="password" name="password" placeholder="Парола">
            		<input type="password" name="confirmed_password" placeholder="Повторете паролата">
            		<input type="text" name="firstname" placeholder="Име">
            		<input type="text" name="lastname" placeholder="Фамилия">
            		<input type="text" name="phone" placeholder="Телефон">
            		<input type="submit" text="Регистрирай">
            	</form>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>

