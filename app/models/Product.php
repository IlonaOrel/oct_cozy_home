<?php


namespace models;

use \components\Db;


class Product
{
    // Количество отображаемых товаров по умолчанию
    const SHOW_BY_DEFAULT = 6;

    /**
     * Возвращает массив последних товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getLatestProducts()
    {
        $db = Db::getConnection();
        $sql ="SELECT all_about_products.*, images_products.image_url FROM all_about_products INNER JOIN images_products ON all_about_products.id = images_products.product_id WHERE images_products.image_url LIKE '%1'";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает список товаров в указанной категории
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsListByCategory($categoryId, $page = 1)
    {

        $limit = Product::SHOW_BY_DEFAULT;
        // Смещение (для запроса)
        $offset = ($page - 1) * self::SHOW_BY_DEFAULT;
        $db = Db::getConnection();
        $sql = "SELECT products.id,products.name as product, products.price as cost, categories.name as category, images_products.image_url as image FROM images_products INNER JOIN products ON images_products.product_id=products.id INNER JOIN categories ON products.category_id = categories.id WHERE categories.id = $categoryId LIMIT $limit OFFSET $offset";
        $result=$db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает продукт с указанным id
     * @param integer $id <p>id товара</p>
     * @return array <p>Массив с информацией о товаре</p>
     */
    public static function getProductById($id)
    {
        $db = Db::getConnection();
        $result=$db->query("SELECT products.id,products.name,products.general_description,products.list_detail, products.price, categories.name, images_products.image_url FROM images_products INNER JOIN products ON images_products.product_id=products.id INNER JOIN categories ON products.category_id = categories.id WHERE products.id=$id");
        return $result->fetch_all(MYSQLI_ASSOC);

    }

    /**
     * Возвращаем количество товаров в указанной категории
     * @param integer $categoryId
     * @return integer
     */
    public static function getTotalProductsInCategory($categoryId)
    {
       $db = Db::getConnection();
       $sql = "SELECT COUNT(products.id) FROM products INNER JOIN categories ON products.category_id=categories.id WHERE products.category_id=$categoryId";
        $result=$db->query($sql);

        return mysqli_fetch_assoc($result);
    }

    /**
     * Возвращает список товаров с указанными индентификторами
     * @param array $idsArray <p>Массив с идентификаторами</p>
     * @return array <p>Массив со списком товаров</p>
     */
    public static function getProdustsByIds($idsArray)
    {
        $db = Db::getConnection();
        // Превращаем массив в строку для формирования условия в запросе
        $idsString = implode(',', $idsArray);
        $sql = "SELECT * FROM products WHERE  id IN ($idsString)";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает список рекомендуемых товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getRecommendedProducts()
    {
         $db = Db::getConnection();
         $result = $db->query("SELECT recomend_product.*, images_products.image_url FROM recomend_product INNER JOIN images_products ON recomend_product.id=images_products.product_id WHERE images_products.image_url LIKE '%1'");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает список товаров
     * @return array <p>Массив с товарами</p>
     */
    public static function getProductsList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT products.id, products.name, products.price, images_products.image_url FROM products INNER JOIN images_products on products.id = images_products.product_id ORDER BY products.id ASC');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Удаляет товар с указанным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
  //  public static function deleteProductById($id)
//    {
//        $db = Db::getConnection();
//        $sql = 'DELETE FROM product WHERE id = $id';
//        $result=$db->query($sql);
//        return mysqli_fetch_assoc($result);
//    }

    /**
     * Редактирует товар с заданным id
     * @param integer $id <p>id товара</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    //todo
    public static function updateProductById($id, $name)
    {
        $db = Db::getConnection();
        $sql = "UPDATE products
            SET 
                name = '$name', 
               
            WHERE products.id = $id";
        $result=$db->query($sql);
        return mysqli_fetch_all($result);
    }

    /**todo
     * Добавляет новый товар
     * @param array  <p>Массив с информацией о товаре</p>
     * @return integer <p>id добавленной в таблицу записи</p>
     */
    public static function createProduct($options)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO product '
            . '(name, code, price, category_id, brand, availability,'
            . 'description, is_new, is_recommended, status)'
            . 'VALUES '
            . '(:name, :code, :price, :category_id, :brand, :availability,'
            . ':description, :is_new, :is_recommended, :status)';

        $result = $db->query($sql);
        return mysqli_fetch_all($result);
    }
    /**
     * Возвращает путь к изображению
     * @param string $imageUrl
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($imageUrl)
    {

        $noImage = 'no-image.jpg';
        $path = 'upload'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR.'products'.DIRECTORY_SEPARATOR;
        $pathToProductImage = $path . $imageUrl . '.jpg';

        if (file_exists($pathToProductImage)) {
          return $pathToProductImage;
        }

        return 'upload'.DIRECTORY_SEPARATOR.'images'.DIRECTORY_SEPARATOR . $noImage;
    }
}