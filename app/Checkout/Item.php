<?php

namespace App\Checkout;

class Item
{
    public $sku;
    public $unitPrice;
    public $specialPrice;

    public function __construct($sku, $unitPrice, $specialPrice = null)
    {
        $this->sku = $sku;
        $this->unitPrice = $unitPrice;
        $this->specialPrice = $specialPrice;
    }
}
