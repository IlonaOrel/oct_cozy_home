<?php include 'views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="bg">
            <div class="row">
                <div class="col-sm-12">
                    <h2 class="title text-center">Контакты</h2>
                    <div id="gmap" class="contact-map">
                        <h4>Адрес</h4>
                        <p>г. Днепр, ул. Донецкое шоссе, 1-А</p>
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2643.268040827806!2d34.98088721566208!3d48.50892617925474!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x40dbe1f64d528867%3A0x3796c9d67bce9e78!2z0JTQvtC90LXRhtC60L7QtSDRiC4sIDHQmiwg0JTQvdC40L_RgNC-LCDQlNC90LXQv9GA0L7Qv9C10YLRgNC-0LLRgdC60LDRjyDQvtCx0LvQsNGB0YLRjCwgNDkwMDA!5e0!3m2!1sru!2sua!4v1627986772700!5m2!1sru!2sua" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
            <div class="row">
            <div class="col-sm-4 col-sm-offset-4 padding-right">
                <?php if ($result): ?>
                    <p>Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    <div class="signup-form"><!--sign up form-->
                        <h2>Обратная связь</h2>
                        <h5>Есть вопрос? Напишите нам</h5>
                        <br/>
                        <form action="#" method="post">
                            <p>Ваша почта</p>
                            <input type="email" name="userEmail" placeholder="E-mail" value="<?= $userEmail; ?>"/>
                            <p>Сообщение</p>
                            <input type="text" name="userText" placeholder="Сообщение" value="<?= $userText; ?>"/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Отправить" />
                        </form>
                    </div><!--/sign up form-->
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
        <div>

        </div>
    </div>
</section>

<?php include  'views/layouts/footer.php'; ?>
