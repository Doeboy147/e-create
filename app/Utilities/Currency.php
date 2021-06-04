<?php


namespace App\Utilities;

use Illuminate\Support\Facades\Http;

class Currency
{

    protected $apiKey = 'access_key=7e85028b2f2c7dda9cd7d937731b8406';

    protected $apiURL = 'http://data.fixer.io/api/';

    protected $symbols = 'USD,AUD,CAD,PLN,MXN';

    protected $endPoint = '';


    public function getExchangeRates($baseCurrency)
    {
        $this->endPoint = 'latest?';
        $url = $this->apiURL . $this->endPoint . $this->apiKey . '&symbols=' . $this->symbols . '&base=' . $baseCurrency . '&format=1';
        $response = Http::get($url);
        return json_decode($response->body(), true);
    }

    public function compareCurrencies($baseCurrency, $currency, $amount)
    {
        $this->endPoint = 'convert?';
        $url = $this->apiURL . $this->endPoint . $this->apiKey . '&from=' . $baseCurrency . '&to=' . $currency . '&amount=' . $amount;
        $response = Http::get($url);
        return json_decode($response, true);
    }

}