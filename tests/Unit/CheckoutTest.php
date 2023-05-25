<?php

namespace Tests\Unit;

use App\Checkout\CheckoutService;
use App\Checkout\Item;
use PHPUnit\Framework\TestCase;

class CheckoutTest extends TestCase
{
    public function testTotalPriceCalculation()
    {
        $pricingRules = [
            'A' => [
                'quantity' => 3,
                'specialPrice' => 130,
            ],
            'B' => [
                'quantity' => 2,
                'specialPrice' => 45,
            ],
            'C' => [
                'quantity' => 1,
                'specialPrice' => null,
            ],
            'D' => [
                'quantity' => 1,
                'specialPrice' => null,
            ],
        ];

        $co = new CheckoutService($pricingRules);

        $co->scan(new Item('A', 50));
        $co->scan(new Item('B', 30));
        $co->scan(new Item('A', 50));
        $co->scan(new Item('A', 50));
        $co->scan(new Item('C', 20));
        $co->scan(new Item('D', 15));

        $total = $co->total();

        $this->assertEquals(195, $total);
    }
}
