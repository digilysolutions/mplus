<?php

namespace App\Services;

use App\Repositories\OwnerRepository;

class OwnerService extends BaseService
{

    public function __construct(OwnerRepository $ownerRepo)
    {
        parent::__construct($ownerRepo);
    }   
}
