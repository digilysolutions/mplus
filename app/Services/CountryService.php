<?php

namespace App\Services;

use App\Repositories\CountryRepository;

class CountryService extends BaseService
{
   
    public function __construct(CountryRepository $countRepo)
    {
        parent::__construct($countRepo);
    
    }

   
   

}

