<?php

namespace Fleetsu\Stock;

use StockInterface;
use StockServiceProvider;

class Stock implements StockInterface
{
    /**
     * @var StockServiceProvider
     */
    private StockServiceProvider $stock_driver;

    public function __construct(StockServiceProvider $stock_driver)
    {
        $this->stock_driver = $stock_driver;
    }

    public function company_profile()
    {
        return $this->stock_driver->company_profile();
    }

    public function company_quote()
    {
        return $this->stock_driver->company_quote();
    }
}
