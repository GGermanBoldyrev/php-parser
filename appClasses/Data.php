<?php

namespace appClasses;

class Data extends Curl
{
    public Curl $page; // Экземпляр класса Curl
    public string $order;
    public array $data = [];

    public function __construct($order = "asc")
    {
        $this->page = new Curl();
        $this->order = strtolower($order);
    }

    public function getOneData() // order 'asc' or 'desc'
    {
        if ($this->order === 'asc' || $this->order === 'desc') {
            // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
            $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=$this->order&sort=price&type=2");
            $this->data = json_decode($page_query)->items;
            // Возвращаем массив из обьектов который будем передавать в класс Items
            return $this->data;
        } else {
            return "Input doesn't match 'asc' or 'desc' value";
        }
    }

    public function getAllData(): array
    {
        // Задаем offset, который имитирует прокрутку страницы
        $offset = 0;
        while (true) {
            $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=$offset&order=asc&sort=price&type=2"); //Получаем json из items
            $new_data_array = json_decode($page_query)->items; // Получаем массив из items, который мы получили в ходе запроса на одну итерацию
            $this->data = array_merge($this->data, $new_data_array);
            // Если массив, который пришел не содержит 60 items, тогда выходим из цикла, иначе снова делаем запрос
            if(sizeof($new_data_array) < 60) {
                break;
            } else {
                $offset += 60;
            }
        }
        return $this->data;
    }
}

