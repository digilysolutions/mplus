<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\CountryCurrencyRepository;
use App\Repositories\CurrencyRepository;

class CountryCurrencyService extends BaseService
{

    public function __construct(CountryCurrencyRepository $countrycurrencyRepo)
    {
        parent::__construct($countrycurrencyRepo);
    }

    //para una lista de producto
    public function convertPrices($products, $currency)
    {

        $exchangeRates =  json_decode($products[0]->categories[0]->exchange_rates, true);
        //return    json_decode($products[0]->categories[0]->exchange_rates, true);
        // return    $exchangeRates[ $products[0]->code_currency_default][$currency];
        return $products->map(function (Product $product) use ($currency) {
            $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
            // $exchangeRates = json_decode($product->categories->exchange_rates, true);
            $priceInOriginalCurrency = $product->sale_price;
            $discounted_priceInOriginalCurrency = $product->discounted_price;

            // Suponiendo que 'USD' es la moneda base para todos los productos
            if (isset($exchangeRates[$product->code_currency_default]) && isset($exchangeRates[$product->code_currency_default][$currency])) {
                $conversionRate = $exchangeRates[$product->code_currency_default][$currency];
                $convertedPrice = $priceInOriginalCurrency * $conversionRate;
                $convertedDiscounted_price = $discounted_priceInOriginalCurrency * $conversionRate;

                $product->sale_price = round($convertedPrice, 2);
                $product->discounted_price = round($convertedDiscounted_price, 2);
                return  $product;
            } else {
                $product->sale_price = $priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
                $product->discounted_price = $discounted_priceInOriginalCurrency; // Sin conversión si el tipo de cambio no existe
            }
            return $product;
        });
    }
    public function convertPrice(Product $product, $currency)
    {
        $exchangeRates = json_decode($product->categories[0]->exchange_rates, true);
        if (isset($exchangeRates[$product->categories[0]->code_currency_default]) && isset($exchangeRates[$product->categories[0]->code_currency_default][$currency])) {
            $conversionRate = $exchangeRates[$product->categories[0]->code_currency_default][$currency];
            $convertedPrice = round($product->sale_price * $conversionRate, 2);
            $convertedDiscountPrice = round($product->discounted_price * $conversionRate, 2);
        } else {
            $convertedPrice = $product->sale_price;
            $convertedDiscountPrice = $product->discounted_price;
        }

        return [
            'converted_price' => $convertedPrice,
            'converted_discount_price' => $convertedDiscountPrice,
            'currency' => $currency,
        ];
    }
}
