<?php


namespace controllers;
use components\AdminBase;

class AdminController extends AdminBase
{
    /**
     * Action для стартовой страницы "Панель администратора"
     */
    public function actionIndex()
    {
        // Проверка доступа
        self::checkAdmin();

        // Подключаем вид
        require_once('views/admin/index.php');
        return true;
    }

}