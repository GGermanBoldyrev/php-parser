<?php

namespace appClasses;

class Data extends Curl
{
    public Curl $page; // Экземпляр класса Curl

    public function __construct()
    {
        $this->page = new Curl();
    }

    public function getOneData($order) // order 'asc' or 'desc'
    {
        if ($order === 'asc' || $order === 'desc') {
            // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
            $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=$order&sort=price&type=2");
            // Возвращаем массив из обьектов который будем передавать в класс Items
            return json_decode($page_query)->items;
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