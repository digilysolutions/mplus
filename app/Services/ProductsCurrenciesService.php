<?php

namespace App\Services;

use App\Repositories\ProductsCurrenciesRepository;

class ProductsCurrenciesService extends BaseService
{

    public function __construct(ProductsCurrenciesRepository $productsCurrenciesRepo)
    {
        parent::__construct($productsCurrenciesRepo);
    }   
}
