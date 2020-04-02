<?php

namespace Fleetsu\Stock;

use StockInterface;

class Stock implements StockInterface
{
    public function __construct($stock_driver)
    {
        return $stock_driver;
    }

    public function company_profile()
    {
        // TODO: Implement company_profile() method.
    }

    public function company_quote()
    {
        // TODO: Implement company_quote() method.
    }
}