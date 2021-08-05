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
                                        <a href="/category/<?= $categoryItem['id']; ?>">
                                            <?= $categoryItem['name']; ?>
                                        </a>
                                    </h4>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 padding-right">

                <div class="features_items"><!--features_items-->
                    <h2 class="title text-center">Последние товары</h2>
                    <?php foreach ($latestProducts as $product): ?>
                        <div class="col-sm-4">
                            <div class="product-image-wrapper">
                                <div class="single-products">
                                    <div class="productinfo text-center">
                                        <img src="<?=\models\Product::getImage($product['image_url']); ?>" alt="Photo product" />
                                        <h2>$<?= $product['price']; ?></h2>
                                        <p>
                                            <a href="/product/<?=$product['id']; ?>">
                                                <?= $product['name']; ?>
                                            </a>
                                        </p>
                                        <a href="#" class="btn btn-default add-to-cart" data-id="<?= $product['id']; ?>"><i class="fa fa-shopping-cart"></i>В корзину</a>
                                    </div>
                               </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div><!--features_items-->

                <div class="recommended_items"><!--recommended_items-->
                    <h2 class="title text-center">Рекомендуемые товары</h2>

                            <div class="cycle-slideshow"
                                 data-cycle-fx=carousel
                                 data-cycle-timeout=5000
                                 data-cycle-carousel-visible=3
                                 data-cycle-carousel-fluid=true
                                 data-cycle-slides="div.item"
                                 data-cycle-prev="#prev"
                                 data-cycle-next="#next">
                                <?php foreach ($sliderProducts as $sliderItem): ?>
                                   <div class="item">
                                        <div class="product-image-wrapper">
                                            <div class="single-products">
                                                <div class="productinfo text-center">
                                                    <img src="<?=\models\Product::getImage($sliderItem['image_url']); ?>" alt="Photo product" />
                                                    <h2>$<?=$sliderItem['price']; ?></h2>
                                                    <a href="/product/<?=$sliderItem['id']; ?>">
                                                        <?=$product['name']; ?>
                                                    </a>
                                                    <br/><br/>
                                                    <a href="#" class="btn btn-default add-to-cart" data-id="<?=$sliderItem['id']; ?>">
                                                        <i class="fa fa-shopping-cart"></i>В корзину
                                                    </a>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                                    <a class="left recommended-item-control" id="prev" href="#recommended-item-carousel" data-slide="prev">
                                        <i class="fa fa-angle-left"></i>
                                    </a>

                                    <a class="right recommended-item-control" id="next"  href="#recommended-item-carousel" data-slide="next">
                                        <i class="fa fa-angle-right"></i>
                                    </a>

                            </div>
                </div>
            </div><!--/recommended_items-->


        </div>
    </div>

</section>

<?php include 'views/layouts/footer.php'; ?>
