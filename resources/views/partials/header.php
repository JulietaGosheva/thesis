<!DOCTYPE html>
<html lang="en">

<body>

<!-- preloader section -->
<section class="preloader">
	<div class="sk-spinner sk-spinner-pulse"></div>
</section>

<!-- navigation section -->
<section class="navbar navbar-default navbar-fixed-top" role="navigation">
	<div class="container">
		<div class="navbar-header">
			<button class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
				<span class="icon icon-bar"></span>
			</button>
			<a href="index.php" class="navbar-brand">FooDZonE</a>
		</div>
		<div class="collapse navbar-collapse">
			<ul class="nav navbar-nav navbar-right">
				<li><a href="<?php echo URL::to('index.php'); ?>" class="smoothScroll">НАЧАЛО</a></li>
				<li><a href="about_us" class="smoothScroll">ЗА НАС</a></li>
				<li><a href="<?php echo URL::to('/dishes/review'); ?>" class="smoothScroll">ЯСТИЯ</a></li>
				<li><a href="#team" class="smoothScroll">ПОРЪЧАЙ</a></li>
				<li><a href="#contact" class="smoothScroll">КОНТАКТИ</a></li>
				<li><a href="<?php echo URL::to('/cart'); ?>" class="smoothScroll">КОЛИЧКА</a></li>
				<li><a href="<?php echo URL::to('login'); ?>" class="smoothScroll">Вход</a><li><a href="javascript:;" class="smoothScroll">/</a></li><li><a href="<?php echo URL::to('registration'); ?>" class="smoothScroll">Регистрация</a></li></li>
			</ul>
		</div>
	</div>
</section>
