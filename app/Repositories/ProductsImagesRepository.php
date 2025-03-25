<?php

namespace App\Repositories;

use App\Models\ProductsImages;
use App\Repositories\BaseRepository;

class ProductsImagesRepository extends BaseRepository
{
    public function __construct(ProductsImages $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'product_id',
        'path_image',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return ProductsImages::class;
    }

}
