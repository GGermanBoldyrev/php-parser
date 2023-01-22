<?php

// Вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Подключаем автозагрузку классов
require_once 'vendor/autoload.php';

// Импортируем классы namespace appClasses
use appClasses\Data as Data;
use appClasses\Items as Items;

$data_obj = new Data();
$items_obj = new Items();
$data = $data_obj->getOneData();
$items = $items_obj->getItemsData($data);

echo '<pre>';
print_r($items);

// include 'view/main_view.php';