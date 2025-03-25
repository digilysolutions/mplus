<?php

namespace App\Repositories;

use App\Models\ProductCategory;
use App\Repositories\BaseRepository;

class ProductCategoryRepository extends BaseRepository
{
    public function __construct(ProductCategory $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',        
        'description',
        'short_code',
        'category_parent',
        'exchange_rates',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductCategory::class;
    }

}
