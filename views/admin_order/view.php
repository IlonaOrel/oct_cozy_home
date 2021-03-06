<?php include 'views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">
            <br/>
            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/order">Управление заказами</a></li>
                    <li class="active">Просмотр заказа</li>
                </ol>
            </div>
            <h4>Просмотр заказа #<?=$order['id']; ?></h4>
            <br/>
            <h5>Информация о заказе</h5>
            <table class="table-admin-small table-bordered table-striped table">
                <tr>
                    <td>Номер заказа</td>
                    <td><?=$order['id']; ?></td>
                </tr>
                <tr>
                    <td>Имя клиента</td>
                    <td><?=$order['name']; ?></td>
                </tr>
                <tr>
                    <td>Телефон клиента</td>
                    <td><?=$order['phone']; ?></td>
                </tr>
                <tr>
                    <td><b>Статус заказа</b></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
            </table>
            <h5>Товары в заказе</h5>
            <table class="table-admin-medium table-bordered table-striped table ">
                <tr>
                    <th>ID товара</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th>Количество</th>
                </tr>
                <?php foreach ($products as $product): ?>
                    <tr>
                        <td><?=$product['id']; ?></td>
                        <td><?=$product['name']; ?></td>
                        <td>$<?=$product['price']; ?></td>
                        <td><?=$productsQuantity[$product['id']]; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
            <a href="/admin/order/" class="btn btn-default back"><i class="fa fa-arrow-left"></i> Назад</a>
        </div>
</section>

<?php include 'views/layouts/footer_admin.php'; ?>

