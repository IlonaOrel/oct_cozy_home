<?php


namespace models;

use \components\Db;
class Category
{
    /**
     * Возвращает массив категорий для списка на сайте
     * @return array <p>Массив с категориями</p>
     */
    public static function getCategoriesList()
    {
        $db = Db::getConnection();
        $result = $db->query('SELECT * FROM categories');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Удаляет категорию с заданным id
     * @param integer $id
     * @return array/boolean <p>Результат выполнения метода</p>
     */
    public static function deleteCategoryById($id)
    {
        $db = Db::getConnection();
        $result = $db->query("DELETE FROM categories WHERE id='$id'");
        return mysqli_fetch_assoc($result);
    }

    /**
     * Редактирование категории с заданным id
     * @param integer $id <p>id категории</p>
     * @param string $name <p>Название</p>
     * @param string $imageUrl <p>Картинка</p>
     * @return array <p>Результат выполнения метода</p>
     */
    public static function updateCategoryById($id, $name, $imageUrl)
    {
        $db = Db::getConnection();
        $sql = "UPDATE categories SET name = '$name', image_url = '$imageUrl', 
            WHERE id = '$id'";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает категорию с указанным id
     * @param integer $id <p>id категории</p>
     * @return array/boolean <p>Массив с информацией о категории</p>
     */
    public static function getCategoryById($id)
    {

        $db = Db::getConnection();
        $sql = "SELECT * FROM categories WHERE id = $id";
        $result = $db->query($sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * Добавляет новую категорию
     * @param string $name <p>Название</p>
     * @param string $imageUrl <p>Картинка</p>
     * @return boolean <p>Результат добавления записи в таблицу</p>
     */
    public static function createCategory($name, $imageUrl)
    {
        $db = Db::getConnection();
        $sql = "INSERT INTO categories (name, image_url)VALUES ('$name', '$imageUrl')";
        $result = $db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает путь к изображению
     * @param string $imageUrl
     * @return string <p>Путь к изображению</p>
     */
    public static function getImage($imageUrl)
    {
        $noImage = 'no-image.jpg';
        $path = 'upload/images/category/';
        $pathToProductImage = $path . $imageUrl . '.jpg';
        if (file_exists($_SERVER['DOCUMENT_ROOT'].$pathToProductImage)) {
           return $pathToProductImage;
        }
        return 'upload/images/'.$noImage;
    }

}