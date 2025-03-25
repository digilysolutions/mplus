<?php

namespace App\Services;

use App\Repositories\UnitBaseRepository;

class UnitBaseService extends BaseService
{

    public function __construct(UnitBaseRepository $unitBaseRepo)
    {
        parent::__construct($unitBaseRepo);
    }   
}
