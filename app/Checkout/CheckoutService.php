<?php

namespace App\Checkout;

class CheckoutService
{
    private $pricingRules;
    private $items;
    private $itemAlreadyCalculated = [];

    public function __construct($pricingRules)
    {
        
        $this->pricingRules = $pricingRules;
        $this->items = [];
    }

    public function scan(Item $item)
    {
        $this->items[] = $item;
    }

    public function total()
    {
        $total = 0;
        
        foreach ($this->items as $item) {
            if (!in_array($item->sku, $this->itemAlreadyCalculated)) {
                $total += $this->calculateItemPrice($item);
            }
        }
    
        return $total;
    }

    private function calculateItemPrice(Item $item)
    {
        $sku = $item->sku;
        if (isset($this->pricingRules[$sku])) {
            $specialPrice = $this->pricingRules[$sku]['specialPrice'] ?? null;
            $quantity = count(array_filter($this->items, function ($i) use ($sku) {
                return $i->sku === $sku;
            }));

            if ($specialPrice !== null && $quantity >= $this->pricingRules[$sku]['quantity']) {
                $remainQuantity = $quantity%$this->pricingRules[$sku]['quantity'];
                $specialPriceCount = (int) ($quantity / $this->pricingRules[$sku]['quantity']);
                $specialPriceTotal = $specialPriceCount * $specialPrice;
                $unitPriceTotal = ($quantity % $this->pricingRules[$sku]['quantity']) * $item->unitPrice;
                $this->itemAlreadyCalculated[] = $sku;
                return $specialPriceTotal + $unitPriceTotal;
            }
        }

        return $item->unitPrice;
    }
}
