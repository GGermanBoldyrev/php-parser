<?php

// Вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Подключаем автозагрузку классов
require_once 'vendor/autoload.php';

$data_obj = new \appClasses\Data();
$items_obj = new \appClasses\Items();
$data = $data_obj->getOneData('asc');


echo '<pre>';
print_r($items_obj->getItemsData($data));

// include 'view/main_view.php';