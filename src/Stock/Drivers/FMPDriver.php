<?php


class FMPDriver extends StockServiceProvider
{
    /**
     * @var string
     */
    private $host = 'https://financialmodelingprep.com';

    /**
     * @var string
     */
    private $company_profile_endpoint = '/api/v3/company/profile/';

    /**
     * @var string
     */
    private $company_quote_endpoint = '/api/v3/quote/';

    /**
     * @return mixed
     */
    public function company_profile()
    {
        $this->companies = implode(',', $this->companies);
        return json_decode($this::get_data($this->host . $this->company_profile_endpoint . $this->companies), true);
    }

    /**
     * @return mixed
     */
    public function company_quote()
    {
        $this->companies = implode(',', $this->companies);
        return json_decode($this::get_data($this->host . $this->company_quote_endpoint . $this->companies), true);
    }
}
