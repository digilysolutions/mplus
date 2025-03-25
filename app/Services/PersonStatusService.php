<?php

namespace App\Services;

use App\Repositories\PersonStatusRepository;

class PersonStatusService extends BaseService
{

    public function __construct(PersonStatusRepository $personStatusRepo)
    {
        parent::__construct($personStatusRepo);
    }   
}
