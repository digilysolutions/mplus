<?php

namespace App\Repositories;

use App\Models\ProductsBusiness;
use App\Repositories\BaseRepository;

class ProductsBusinessRepository extends BaseRepository
{
    public function __construct(ProductsBusiness $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'product_id',
        'business_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductsBusiness::class;
    }

}
