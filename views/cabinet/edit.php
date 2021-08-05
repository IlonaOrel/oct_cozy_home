<?php include 'views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?=$error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?=$name; ?>"/>

                            <p>Пароль:</p>
                            <input type="password" name="password" placeholder="Пароль" value="<?=$password; ?>"/>

                            <p>Еmail:</p>
                            <input type="email" name="email"  value="<?=$email; ?>"/>

                            <p>Телафон:</p>
                            <input type="text" name="phone" placeholder="" value="<?=$phone; ?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include 'views/layouts/footer_admin.php'; ?>
