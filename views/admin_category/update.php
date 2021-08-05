<?php include  'views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/category">Управление категориями</a></li>
                    <li class="active">Редактировать категорию</li>
                </ol>
            </div>
            <h4>Редактировать категорию "<?=$category['name']; ?>"</h4>
            <br/>
            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post">
                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?=$category['name']; ?>">
                        <p>Изображение категории</p>
                        <img src="<?=\models\Category::getImage($category['id']); ?>" width="50" alt="Photo category" />                                  <input type="file" name="image" placeholder="" value="<?=$category['image']; ?>">
                        <br><br>
                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php include  'views/layouts/footer_admin.php'; ?>

