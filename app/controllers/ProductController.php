<?php


namespace controllers;

use \models\Category;
use \models\Product;

class ProductController
{
    /**
     * Action для страницы просмотра товара
     * @param integer $productId <p>id товара</p>
     */
    public function actionView($productId)
    {
        // Список категорий для левого меню
        $categories = Category::getCategoriesList();

        // Получаем инфомрацию о товаре
        $oneProduct = Product::getProductById($productId);

        // Подключаем вид
        require_once('views/product/view.php');
        return true;
    }
}