<?php

use Fleetsu\Stock\Stock;
use PHPUnit\Framework\TestCase;

final class FMPStockTest extends TestCase
{
    /**
     * @var FMPDriver
     */
    protected FMPDriver $google_stock_driver;

    /**
     * @var FMPDriver
     */
    protected FMPDriver $google_fb_stock_driver;

    protected function setUp(): void
    {
        $this->google_stock_driver = new FMPDriver(['googl']);
        $this->google_fb_stock_driver = new FMPDriver(['googl', 'fb']);
    }

    public function testGoogleStockProfile()
    {
        $stock = new Stock($this->google_stock_driver);
        $data = $stock->company_profile();
        $this->assertEquals('GOOGL', $data['symbol']);
        $this->assertTrue(in_array('profile', array_keys($data)));
    }

    public function testGoogleStockQuote()
    {
        $stock = new Stock($this->google_stock_driver);
        $data = $stock->company_quote();
        $this->assertEquals(1, count($data));
        $this->assertTrue(in_array('price', array_keys($data[0])));
        $this->assertTrue(true);
    }

    public function testGoogleFBStockProfile()
    {
        $stock = new Stock($this->google_fb_stock_driver);
        $data = $stock->company_profile();
        $this->assertTrue(in_array('companyProfiles', array_keys($data)));
        $this->assertEquals(2, count($data['companyProfiles']));
    }

    public function testGoogleFBQuoteProfile()
    {
        $stock = new Stock($this->google_fb_stock_driver);
        $data = $stock->company_quote();
        $this->assertEquals(2, count($data));
        $this->assertTrue(in_array('price', array_keys($data[0])));
        $this->assertTrue(in_array('price', array_keys($data[1])));
    }
}
