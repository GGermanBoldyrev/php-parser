<?php

// импользуем namespace классов
use appClasses\Data as Data;
use appClasses\Items as Items;

$data_obj = new Data();
$items_obj = new Items();

$data = $data_obj->getDataByPriceDesc();
$items = $items_obj->getItemsData($data);

echo '<h1 class="items_block_title">Top price knifes</h1>';

include 'items_view.php';