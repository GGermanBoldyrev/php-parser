<?php

// Вывод ошибок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Подключаем автозагрузку классов
require_once 'vendor/autoload.php';

include 'view/main_view.php';