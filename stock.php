<?php

include 'vendor/autoload.php';

use Fleetsu\Stock\Stock;

$supported_commands = [
    'Stock' => get_class_methods(StockInterface::class)
];

/**
 * Read inputs
 */
try {
    switch ($argv[0]) {
        case 'stock.php':
            if (in_array($argv[1], $supported_commands['Stock'])) {
                $method = $argv[1];
                $companies = explode(',', $argv[2]);
                $fmpdriver = new FMPDriver($companies);
                print_r((new Stock($fmpdriver))->$method());
            } else {
                throw new StockInputException('Invalid Stock method. Please refer documentation. Use one of: ' . implode(', ', $supported_commands['Stock']) . PHP_EOL);
            }
            break;
        default:
            throw new StockInputException('Invalid command. Please refer documentation.');
    }
} catch (StockInputException $stockInputException) {
    echo $stockInputException->getMessage();
}
