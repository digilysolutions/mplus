<?php

namespace App\Services;

use App\Repositories\WarehouseRepository;

class WarehouseService extends BaseService
{
 
    public function __construct(WarehouseRepository $warehouseRepo)
    {
        parent::__construct($warehouseRepo);
    }   
}
