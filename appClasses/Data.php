<?php

namespace appClasses;

class Data extends Curl
{
    public Curl $page; // Экземпляр класса Curl
    public array $data = [];

    public function __construct()
    {
        $this->page = new Curl();
    }

    public function getDataByPriceAsc()
    {
        // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
        $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=asc&sort=price&type=2");
        $this->data = json_decode($page_query, true)['items'];
        // Так как data от сервера приходит с ошибками в сортировке по цене, мы отсортируем ее ниже
        usort($this->data, function ($a, $b) {
            return ($a['pricing']['computed'] - $b['pricing']['computed']);
        });
        // Возвращаем массив из обьектов который будем передавать в класс Items
        return $this->data;
    }

    public function getDataByPriceDesc()
    {
        // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
        $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=desc&sort=price&type=2");
        $this->data = json_decode($page_query, true)['items'];
        // Так как data от сервера приходит с ошибками в сортировке по цене, мы отсортируем ее ниже
        usort($this->data, function ($a, $b) {
            return ($b['pricing']['computed'] - $a['pricing']['computed']);
        });
        // Возвращаем массив из обьектов который будем передавать в класс Items
        return $this->data;
    }

    public function getDataByDiscount(): array
    {
        // Отправляет cURL запрос на получение 60 позиций в порядке возрастания или убывания
        $page_query = $this->page->sendQuery("https://cs.money/1.0/market/sell-orders?limit=60&offset=0&order=desc&sort=discount&type=2");
        $this->data = json_decode($page_query, true)['items'];
        // Возвращаем массив из обьектов который будем передавать в класс Items
        return $this->data;
    }
}

