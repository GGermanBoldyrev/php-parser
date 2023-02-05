<?php

// импользуем namespace классов
use appClasses\Data as Data;
use appClasses\Items as Items;

$data_obj = new Data();
$items_obj = new Items();

$data = $data_obj->getDataByDiscount();
$items = $items_obj->getItemsData($data);

echo '<h1 class="items_block_title">Top discount knifes</h1>';

include 'items_view.php';