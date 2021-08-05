<?php include 'views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <h2>Каталог</h2>
                        <div class="panel-group category-products">
                            <?php foreach ($categories as $categoryItem): ?>
                                <div class="panel panel-default">
                                    <div class="panel-heading">
                                        <h4 class="panel-title">
                                            <a href="/category/<?=$categoryItem['id']; ?>">
                                                <?=$categoryItem['name']; ?>
                                            </a>
                                        </h4>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="product-details"><!--product-details-->
                        <div class="row">
                            <?php foreach ($oneProduct as $product):?>
                            <div class="col-sm-5">
                                <div class="view-product">
                                    <img src="<?=\models\Product::getImage($product['image_url']);?>" alt="Photo product" />
                                </div>
                            </div>
                            <div class="col-sm-7">
                                <div class="product-information"><!--/product-information-->
                                    <h2><?=$product['name']; ?></h2>
                                    <p>Код товара: <?=$product['id']; ?></p>
                                    <span>
                                    <span> $<?=$product['price']; ?></span>
                                    <a href="#" data-id="<?=$product['id']; ?>"
                                       class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину
                                    </a>
                                </span>
                                    <p><b>Краткое описание:</b> <?=$product['general_description']; ?></p>
                                </div><!--/product-information-->
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <br/>
                                <h5>Описание товара</h5>
                                <?=$product['list_detail']; ?>
                            </div>
                        </div>
                    </div><!--/product-details-->
                    <?php endforeach;?>
                </div>
            </div>
        </div>
    </section>

<?php include 'views/layouts/footer.php'; ?>