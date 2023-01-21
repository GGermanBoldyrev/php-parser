<?php

namespace appClasses;

class Data extends Curl
{
    public Curl $page; // Экземпляр класса Curl
    public array $all_data = []; //Переменная содержит массив позиций с нужными параметрами

    public function __construct()
    {
        $this->page = new Curl();
    }

    public function getOneData($order) // order 'asc' or 'desc'
    {
        if ($order === 'asc' || $order === 'desc') {
            // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
            $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=$order&sort=price&type=2");
            // Переменная $items_array принимает массив из объектов (позиций)
            $items_array = json_decode($page_query)->items;

            // Итерируемся по массиву из полученных позиций и добавляем нужные параметры в массив
            for ($i = 0; $i < sizeof($items_array); $i++) {
                $this->all_data[] = [
                    'img' => $items_array[$i]->asset->images->steam,
                ];
            }
            // Возвращаем полученынй массив из нужных значений
            return $this->all_data;
        } else {
            return "Input doesn't match 'asc' or 'desc' value";
        }
    }

    public function getAllData()
    {
        $all_data = []; // Добавить пуш в массив
        for ($offset = 0; $offset <= 2580; $offset += 60) {
            $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=$offset&order=asc&sort=price&type=2");
            $data = json_decode($page_query)->items;
        }
        return json_decode($page_query);
    }
}