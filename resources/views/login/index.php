<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
                    <h1 class="heading">Вход</h1>
                    <hr>
            </div>
            <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
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
            		}
            	?>
                <form action="<?php echo URL::to('/login'); ?>" method="POST">
                    <div class="col-md-6 col-sm-6" >
                        <input name="email" type="text" class="form-control" id="name" placeholder="Email">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input name="password" type="password" class="form-control" id="email" placeholder="Password">
                    </div>
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                        <input name="submit" type="submit" class="form-control" id="submit" value="ВХОД">
                    </div>
                    <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6" align="center">
                        <a href="registration"> Регистрирай се!</a>
                    </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-1"></div>
        </div>
    </div>
</section>
<?php include_once "/../partials/footer.php"; ?>

