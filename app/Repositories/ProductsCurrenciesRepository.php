<?php

namespace App\Repositories;

use App\Models\ProductsCurrencies;
use App\Repositories\BaseRepository;

class ProductsCurrenciesRepository extends BaseRepository
{
    public function __construct(ProductsCurrencies $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'product_id',
        'currency_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductsCurrencies::class;
    }

}
