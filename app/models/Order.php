<?php


namespace models;

use \components\Db;

class Order
{
    /**todo не знаю как ?
     * Сохранение заказа
     * @param string $nameFull <p>Полное имя</p>
     * @param string $email <p>Электронный адрес</p>
     * @param string $phone <p>Телефон</p>
     * @param integer $totalCost <p>Стоимоть заказа</p>
     * @param array $products <p>Массив с товарами</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function save($nameFull, $email, $phone, $productsInCart)
    {
        $productsInCart = json_encode($productsInCart);

         $db = Db::getConnection();
         $sql = "INSERT INTO `orders`( `name_full`, `email`, `phone`, `products_in_cart`) VALUES ('$nameFull', '$email', '$phone', '$productsInCart')";
        $result=$db->query($sql);
        return $result;
    }
    /**
     * Возвращает список заказов
     * @return array <p>Список заказов</p>
     */
    public static function getOrdersList()
    {
         $db = Db::getConnection();
        $result = $db->query('SELECT orders.id, orders.name_full as name, orders.phone, status_orders.status FROM orders INNER JOIN status_orders ON orders.id=status_orders.order_id');
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Возвращает текстое пояснение статуса для заказа :<br/>
     * <i>1 - Новый заказ, 2 - В обработке, 3 - Доставляется, 4 - Закрыт</i>
     * @param integer $status <p>Статус</p>
     * @return string <p>Текстовое пояснение</p>
     */
    public static function getStatusText($status)
    {
        switch ($status) {
            case '1':
                return 'Новый заказ';
                break;
            case '2':
                return 'В обработке';
                break;
            case '3':
                return 'Доставляется';
                break;
            case '4':
                return 'Закрыт';
                break;
        }
    }

    /**
     * Возвращает заказ с указанным id
     * @param integer $id <p>id</p>
     * @return array <p>Массив с информацией о заказе</p>
     */
    public static function getOrderById($id)
    {
        $db = Db::getConnection();
        $sql = "SELECT orders.id, orders.name_full as name, orders.phone, status_orders.status FROM orders INNER JOIN status_orders ON orders.id=status_orders.order_id WHERE orders.id = '$id'";
        $result=$db->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    /**
     * Удаляет заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function deleteOrderById($id)
    {
        $db = Db::getConnection();
        $sql = "DELETE FROM orders WHERE orders.id = ''$id'";
        $result=$db->query($sql);
        return mysqli_fetch_assoc($result);
    }

    /**
     * Редактирует заказ с заданным id
     * @param integer $id <p>id заказа</p>
     * @param integer $status <p>Статус <i>(включено "1", выключено "0")</i></p>
     * @return boolean <p>Результат выполнения метода</p>
     */
    public static function updateOrderById($id, $status)
    {
       $db = Db::getConnection();
       $sql = "UPDATE status_orders SET status= '$status' WHERE status_orders.id = $id";
        $result=$db->query($sql);
        return mysqli_fetch_assoc($result);
    }
}