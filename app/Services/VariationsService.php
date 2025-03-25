<?php

namespace App\Services;

use App\Repositories\VariationsRepository;

class VariationsService extends BaseService
{

    public function __construct(VariationsRepository $variationsRepo)
    {
        parent::__construct($variationsRepo);
    }   
}
