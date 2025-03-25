<?php

namespace App\Repositories;

use App\Models\ModelProduct;
use App\Repositories\BaseRepository;

class ModelProductRepository extends BaseRepository
{
    public function __construct(ModelProduct $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'description',
        'year',
        'characteristics',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ModelProduct::class;
    }
    public function findAllModelsWithProducts()
    {
        return ModelProduct::with('products')->get();
    }
    
}
