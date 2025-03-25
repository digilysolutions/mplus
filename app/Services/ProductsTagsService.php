<?php

namespace App\Services;

use App\Repositories\ProductsTagsRepository;

class ProductsTagsService extends BaseService
{

    public function __construct(ProductsTagsRepository $productsTagsRepo)
    {
        parent::__construct($productsTagsRepo);
    }   
}
