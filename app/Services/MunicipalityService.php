<?php

namespace App\Services;

use App\Repositories\MunicipalityRepository;

class MunicipalityService extends BaseService
{

    public function __construct(MunicipalityRepository $municipalityRepo)
    {
        parent::__construct($municipalityRepo);
    }   
}
