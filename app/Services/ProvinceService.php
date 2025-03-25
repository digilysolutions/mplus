<?php

namespace App\Services;

use App\Repositories\ProvinceRepository;

class ProvinceService extends BaseService
{   
    public function __construct(ProvinceRepository $provinceRepo)
    {
        parent::__construct($provinceRepo);
    }   
}
