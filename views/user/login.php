<?php include  'views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">

                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>

                <div class="signup-form"><!--sign up form-->
                    <h2>Вход на сайт</h2>
                    <form action="#" method="post">
                        <input type="email" name="email" placeholder="E-mail" value="<?= $email; ?>"/>
                        <input type="password" name="password" placeholder="Пароль" value="<?= $password; ?>"/>
                        <input type="submit" name="submit" class="btn btn-default" value="Вход" />
                    </form>
                </div><!--/sign up form-->


                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include 'views/layouts/footer_admin.php'; ?>
