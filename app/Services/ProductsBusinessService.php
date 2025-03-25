<?php

namespace App\Services;

use App\Repositories\ProductsBusinessRepository;

class ProductsBusinessService extends BaseService
{

    public function __construct(ProductsBusinessRepository $productsBusinessRepo)
    {
        parent::__construct($productsBusinessRepo);
    }   
}
