<?php

namespace appClasses;

class Items extends Data
{
    public array $items_array = [];

    public function getItemsData($data): array
    {
        $cur = new Currency();
        $usd_value = $cur->getOneCurrency('usd');
        // Итерируемся по массиву из полученных позиций и добавляем нужные параметры в массив
        for ($i = 0; $i < sizeof($data); $i++) {
            $this->items_array[] = [
                'img' => $data[$i]['asset']['images']['steam'],
                'name' => $data[$i]['asset']['names']['full'],
                'default_price' => $data[$i]['pricing']['default'],
                'discount' => $data[$i]['pricing']['discount'] > 0 ? round($data[$i]['pricing']['discount'] * 100) : 0,
                'total_price_usd' => number_format(round($data[$i]['pricing']['computed'])),
                'total_price_rub' => number_format(round($data[$i]['pricing']['computed'] * $usd_value))
            ];
        }
        return $this->items_array;
    }
}
