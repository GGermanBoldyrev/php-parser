<?php

namespace appClasses;

// Класс для конвертации валют
class Currency
{
    const LINK = 'https://www.cbr-xml-daily.ru/daily_json.js';   // Ссылка на обменник валют в формате json
    public Curl $page; // Экземпляр класса Curl
    public array $all_currency;

    public function __construct()
    {
        $this->page = new Curl();
        // Переменная $all_currency принимает массив валют
        $this->all_currency = json_decode($this->page->sendQuery(self::LINK), true)['Valute'];
    }

    public function getOneCurrency($currency): float|string
    {
        // Переводим переданное значение переменной $currency в uppercase
        $currency = strtoupper($currency);
        // Переменная $valute_exists проверяет, существует ли заданная валюта в массиве
        $valute_exists = isset($this->all_currency[$currency]);

        if ($valute_exists) {
            // Возвращаем стоимость заданной валюты в рублях
            return $this->all_currency[$currency]['Value'];
        } else {
            return "This currency isn't supported";
        }
    }
}