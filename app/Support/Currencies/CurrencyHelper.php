<?php


namespace Bookkeeper\Support\Currencies;


class CurrencyHelper {

    /** @var string */
    public $base = null;

    /** @var array */
    public static $currencies = [
        'AUD', 'BGN', 'BRL', 'CAD', 'CHF', 'CNY', 'CZK', 'DKK',
        'EUR', 'GBP', 'HKD', 'HRK', 'HUF', 'IDR', 'ILS', 'INR',
        'JPY', 'KRW', 'MXN', 'MYR', 'NOK', 'NZD', 'PHP', 'PLN',
        'RON', 'RUB', 'SEK', 'SGD', 'THB', 'TRY', 'USD', 'ZAR'
    ];

    /**
     * Returns a list of currencies
     *
     * @return array
     */
    public static function getCurrencies()
    {
        $currencies = [];

        foreach (static::$currencies as $currency)
        {
            $currencies[$currency] = $currency;
        }

        return $currencies;
    }

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->base = env('DEFAULT_CURRENCY');
    }

}