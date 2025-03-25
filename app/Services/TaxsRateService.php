<?php

namespace App\Services;

use App\Repositories\TaxsRateRepository;

class TaxsRateService extends BaseService
{
    public function __construct(TaxsRateRepository $taxsRateRepo)
    {
        parent::__construct($taxsRateRepo);
    }   
}
