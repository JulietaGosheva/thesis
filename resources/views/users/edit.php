<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">За Нас</h1>
                <hr>
            </div>
            <div class="col-md-4 col-sm-4 wow fadeInUp" data-wow-delay="0.3s">
            	<?php
            		if (isset($user)) { ?>
		            	<form action="<?php echo URL::to('/users/edit'); ?>" method="POST">
		            		<input type="email" name="email" placeholder="Емайл" text="<?php echo $user->email; ?>">
		            		<input type="password" name="password" placeholder="Парола" text="">
		            		<input type="text" name="firstname" placeholder="Име" text="<?php echo $user->firstname; ?>">
		            		<input type="text" name="lastname" placeholder="Фамилия" text="<?php echo $user->lastname; ?>">
		            		<input type="text" name="phone" placeholder="Телефон" text="<?php echo $user->phone; ?>">
		            		<input type="submit" text="Редактирай">
		            	</form>
				<?php           			
            		} else if (isset($errors)) {
            			var_dump($errors);
            		}
            	?>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>