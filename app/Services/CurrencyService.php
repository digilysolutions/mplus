<?php

namespace App\Services;

use App\Repositories\CurrencyRepository;

class CurrencyService extends BaseService
{
   
    public function __construct(CurrencyRepository $currencyRepo)
    {
        parent::__construct($currencyRepo);
    
    }

   
   

}

