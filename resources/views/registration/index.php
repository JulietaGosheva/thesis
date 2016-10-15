<?php include_once "/../partials/header.php"; ?>
<?php include_once "/../partials/head.php"; ?>

<section id="contact" class="parallax-section">
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 col-sm-12 text-center">
                    <h1 class="heading">Регистрирай се</h1>
                    <hr>
            </div>
            <div class="col-md-offset-1 col-md-10 col-sm-12 wow fadeIn" data-wow-delay="0.9s">
                <form action="POST" method="post">
                    <div class="col-md-6 col-sm-6">
                        <input name="email" type="text" class="form-control" id="name" placeholder="Email">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Име">
                    </div>
                    <div class="col-md-6 col-sm-6">
                        <input name="password" type="password" class="form-control" id="email" placeholder="Парола">
                    </div>
                   <div class="col-md-6 col-sm-6">
                        <input name="password" type="password" class="form-control" id="email" placeholder="Повторете паролата">
                    </div>
                        <div class="col-md-offset-3 col-md-6 col-sm-offset-3 col-sm-6">
                            <input name="submit" type="submit" class="form-control" id="submit" value="Регистрация">
                        </div>
                </form>
            </div>
            <div class="col-md-2 col-sm-1"></div>
        </div>
    </div>
</section>
<?php include_once "/../partials/footer.php"; ?>

