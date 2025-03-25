<?php

namespace App\Services;

use App\Repositories\ModelProductRepository;

class ModelProductService extends BaseService
{
    protected      ModelProductRepository $repo;
    public function __construct(ModelProductRepository $modelProductRepo)
    { 
         $this->repo = $modelProductRepo;
        parent::__construct($modelProductRepo);
    }  
    
    public function findAllModelsWithProducts()
    {
        return $this->repo->findAllModelsWithProducts();
    }
}
