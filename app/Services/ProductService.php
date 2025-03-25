<?php

namespace App\Services;

use App\Models\Product;
use App\Repositories\ProductRepository;

class ProductService extends BaseService
{
    protected      ProductRepository $repo;
    public function __construct(ProductRepository $productRepo)
    {
        $this->repo = $productRepo;
        parent::__construct($productRepo);
    }
    public function findRepoAllProductId()
    {
        return  $this->repo->findAllProducts();
    }
    public function findProductId($id)
    {
        return  $this->repo->findRepoProductId($id);
    }
    public function bestSellingRepoProducts()
    {
        return  $this->repo->bestSellingProducts();
    }
    public function mostViewedRepoProducts()
    {
        return  $this->repo->mostViewedProducts();
    }


}
