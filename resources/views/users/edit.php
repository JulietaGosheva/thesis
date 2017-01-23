<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="gallery" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-2 col-md-8 col-sm-12 text-center">
                <h1 class="heading">Редактиране на профила</h1>
                <hr>
            </div>
            <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeInUp" data-wow-delay="0.3s">
            	<?php
					if (isset($errors) && count($errors) > 0) {
            			foreach ($errors as $error) { ?>
	            			<div class="alert alert-danger alert-dismissible" role="alert" style="text-align: center">
							  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
							  	<strong><?php echo $error; ?></strong> 
							</div>
	            		<?php 
            			}
            		} else if (isset($success) && count($success) > 0) { ?>
            			<div class="alert alert-success alert-dismissible" role="alert" style="text-align: center">
						  	<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
						  	<strong><?php echo $success; ?></strong> 
						</div>
            		<?php 
            		} else if (isset($user)) { ?>
		            	<form action="<?php echo URL::to('/users/edit'); ?>" method="POST">
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-md-6 form-control" type="email" name="email" placeholder="Емайл" value="<?php echo $user->email; ?>">
		            		</div>
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-sm-6 form-control" type="text" name="firstname" placeholder="Име" value="<?php echo $user->firstname; ?>">
		            		</div>
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-sm-6 form-control" type="text" name="lastname" placeholder="Фамилия" value="<?php echo $user->lastname; ?>">
		            		</div>
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-sm-6 form-control" type="text" name="phone" placeholder="Телефон" value="<?php echo $user->phone; ?>">
		            		</div>
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-sm-6 form-control" type="password" name="password" placeholder="Парола" value="">
		            		</div>
		            		<div class="col-md-6 col-sm-6" style="margin-bottom: 20px;">
			            		<input class="col-sm-6 form-control" type="password" name="password_confirmation" placeholder="Повторете парола" value="">
		            		</div>
		            		<div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
			            		<input class="col-sm-12 btn btn-primary" type="submit" text="Редактирай">
		            		</div>
		            	</form>
				<?php           			
            		}
            	?>
            </div>
        </div>
    </div>
</section>

<?php include_once "/../partials/footer.php"; ?>