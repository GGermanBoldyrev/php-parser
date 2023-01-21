<?php

namespace appClasses;

class Items extends Data
{
    public array $data = [];
    public function getItemsData($data): array
    {
        for ($i = 0; $i < sizeof($data); $i++)
        {
            $this->data[] = [];
        }
        return $this->data;
    }
}