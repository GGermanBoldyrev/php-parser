<?php

namespace appClasses;

class Items extends Data
{
    public array $items_array = [];

    public function getItemsData($data): array
    {
        // Итерируемся по массиву из полученных позиций и добавляем нужные параметры в массив
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->items_array[] = [
                'img' => $data[$i]->asset->images->steam
            ];
        }
        return $this->items_array;
    }
}
