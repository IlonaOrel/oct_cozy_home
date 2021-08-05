<?php include 'views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <h3>Кабинет пользователя</h3>

            <h4>Привет, <?=$user['name'];?>!</h4>
            <ul>
                <li><a href="/cabinet/edit">Редактировать данные</a></li>
                <!--<li><a href="/cabinet/history">Список покупок</a></li>-->
            </ul>

        </div>
    </div>
</section>

<?php include 'views/layouts/footer_admin.php'; ?>
