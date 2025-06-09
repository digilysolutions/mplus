<?php

namespace App\Models;
use Ramsey\Uuid\Uuid;

use Illuminate\Database\Eloquent\Model;

/**
 * Class ProductCurrencyPrice
 *
 * @property $id
 * @property $product_id
 * @property $currency_id
 * @property $purchase_price
 * @property $sale_price
 * @property $discount_price
 * @property $price_type
 * @property $effective_date
 * @property $expiration_date
 * @property $profit_margin_percentage
 * @property $profit_amount
 * @property $profit_value
 * @property $account_income
 * @property $account_cost
 * @property $account_tax
 * @property $tax_rate
 * @property $tax_account
 * @property $price_category
 * @property $concept
 * @property $exchange_rate
 * @property $notes
 * @property $created_at
 * @property $updated_at
 *
 * @property CountryCurrency $countryCurrency
 * @property Product $product
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class ProductCurrencyPrice extends Model
{
    
    protected $perPage = 20;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = ['product_id', 'currency_id', 'purchase_price', 'sale_price', 'discount_price', 'price_type', 'effective_date', 'expiration_date', 'profit_margin_percentage', 'profit_amount', 'profit_value', 'account_income', 'account_cost', 'account_tax', 'tax_rate', 'tax_account', 'price_category', 'concept', 'exchange_rate', 'notes'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function countryCurrency()
    {
        return $this->belongsTo(\App\Models\CountryCurrency::class, 'currency_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(\App\Models\Product::class, 'product_id', 'id');
    }
    
}
