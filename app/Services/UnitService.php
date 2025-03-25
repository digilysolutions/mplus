<?php

namespace App\Services;

use App\Repositories\UnitRepository;

class UnitService extends BaseService
{

    public function __construct(UnitRepository $unitRepo)
    {
        parent::__construct($unitRepo);
    }   
}
