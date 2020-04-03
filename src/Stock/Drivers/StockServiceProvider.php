<?php

abstract class StockServiceProvider implements StockInterface
{
    /**
     * @var string
     */
    protected $companies;

    /**
     * StockServiceProvider constructor.
     * @param array $companies
     */
    public function __construct($companies = [])
    {
        $this->companies = $companies;
    }

    /**
     * @param $url
     * @param string $method
     * @param array $content
     * @return false|string
     */
    public static function get_data($url, $method = 'GET', $content = [])
    {
        $opts = [
            'http' => [
                'method' => $method,
                'content' => $content
            ]
        ];

        $context = stream_context_create($opts);

        return file_get_contents($url, false, $context);
    }
}
