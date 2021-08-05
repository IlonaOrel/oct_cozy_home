<?php


namespace components;


class Db
{
    /**
     * Устанавливает соединение с базой данных
     *
     */
    public static function getConnection()
    {
        // Получаем параметры подключения из файла
        include_once 'config/db_params.php';


        // Устанавливаем соединение
        $db = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


         return $db;
    }

}