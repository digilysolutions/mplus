<?php

namespace App\Services;

use App\Repositories\ProductsVariationsRepository;

class ProductsVariationsService extends BaseService
{

    public function __construct(ProductsVariationsRepository $productsVariationsRepo)
    {
        parent::__construct($productsVariationsRepo);
    }   
}
