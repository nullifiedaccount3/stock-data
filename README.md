# Stock Data

Fetch stock data using any driver.

## Prerequisites
 - PHP 7+
 - composer

## Usage

    Syntax: `php stock.php <command> <parameter1> <parameter2>` 
    Example: `php stock.php profile googl`

### Company Profile command

    Syntax: `php stock.php company_profile COMPANY_STOCK_CODE`
    Example: `php stock.php company_profile googl,fb`

**COMPANY_STOCK_CODE** is case in-sensitive

### Company Quote command

    Syntax: `php stock.php company_quote COMPANY_STOCK_CODE`
    Example: `php stock.php company_quote googl,fb`

**COMPANY_STOCK_CODE** is case in-sensitive 

## Tests

Run `composer test` which automatically tests everything under `tests`

## Data Drivers
### Financial Modeling Prep API driver
- Edit `src/Stock/Drivers/FMPDriver.php`
- To add new methods, add them first in `StockInterface`

### Custom driver

To create a customer stock data driver
- Create the new driver file in `src/Stock/Drivers`
- Simply extend `StockServiceProvider` and implement the necessary methods
  