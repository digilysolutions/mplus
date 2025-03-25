<?php

namespace App\Repositories;

use App\Models\Stock;
use App\Repositories\BaseRepository;

class StockRepository extends BaseRepository
{
    public function __construct(Stock  $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'warehouse_id',
        'quantity_available',
        'minimum_quantity',
        'maximum_quantity',
        'sale_price',
        'product_id',
        'taxs_rates_id',
        'unit_id',
        'enable_discounts_by_quantities',
        'enable_discounts_by_weights',
        'enable_discounts_by_expiration_dates',
        'enable_discounts_by_discounts_by_important_dates',
        'discounts_by_quantities_id',
        'discounts_by_weights_id',
        'discounts_by_expiration_dates_id',
        'discounts_by_discounts_by_important_dates_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Stock::class;
    }
}
