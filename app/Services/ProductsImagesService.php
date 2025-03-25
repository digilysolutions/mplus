<?php

namespace App\Services;

use App\Repositories\ProductsImagesRepository;

class ProductsImagesService extends BaseService
{

    public function __construct(ProductsImagesRepository $productsImagesRepo)
    {
        parent::__construct($productsImagesRepo);
    }   
}
