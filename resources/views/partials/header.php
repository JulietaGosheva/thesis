<!DOCTYPE html>
<html lang="en">

<body>

<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<?php 

	function isAdminUser() {
		$user = request()->session()->get('user');
		if ($user === null) {
			return false;
		}
		
		$roles = $user->roles()->get();
		foreach ($roles as $role) {
			if ($role->name === "Administrator") {
				return true;
			}
		}
		return false;
	}

	function isUserLoggedIn() {
		return request()->session()->get('user') !== null;
	}
?>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<?php 
				if (isAdminUser()) { ?>
					<a href="javascript:;" class="navbar-brand">Администрация</a>
				<?php 
				} else { ?> 
					<a href="<?php echo URL::to(''); ?>" class="navbar-brand">FooDZone</a>
				<?php 
				} ?>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<?php 
					if (isAdminUser()) { ?>
						<li><a href="<?php echo URL::to('dishes/edit'); ?>" class="smoothScroll">Редактиране на ястия</a></li>
						<li><a href="<?php echo URL::to('dishes/creation'); ?>" class="smoothScroll">Създаване на ястия</a></li>
						<li><a href="<?php echo URL::to('dishes/deletion'); ?>" class="smoothScroll">Изтриване на ястия</a></li>
						<li><a href="<?php echo URL::to('orders'); ?>" class="smoothScroll">Списък с поръчки</a></li>
					<?php
					} else {?>
						<li><a href="<?php echo URL::to(''); ?>" class="smoothScroll">НАЧАЛО</a></li>
						<li><a href="<?php echo URL::to('about_us'); ?>" class="smoothScroll">ЗА НАС</a></li>
						<li><a href="<?php echo URL::to('dishes/review'); ?>" class="smoothScroll">ЯСТИЯ</a></li>
						<li><a href="<?php echo URL::to('/cart'); ?>" class="smoothScroll"><span class="fa fa-shopping-cart"></span> КОЛИЧКА</a></li>
						<?php if (isUserLoggedIn()) { ?>
							<li><a href="<?php echo URL::to('users/edit'); ?>" class="smoothScroll">РЕДАКТИРАНЕ НА ПРОФИЛА</a></li>
						<?php }?>
					<?php
					}
					
					if (isUserLoggedIn()) { ?>
						<li><a href="<?php echo URL::to('/logout'); ?>" class="smoothScroll">ИЗХОД</a><li>
					<?php
					} else { ?>
						<li><a href="<?php echo URL::to('/login'); ?>" class="smoothScroll">ВХОД</a><li><a href="javascript:;" class="smoothScroll">/</a></li><li><a href="<?php echo URL::to('/registration'); ?>" class="smoothScroll">РЕГИСТРАЦИЯ</a></li></li>
					<?php	
					}
				?>
			</ul>
		</div>
	</div>
</section>
