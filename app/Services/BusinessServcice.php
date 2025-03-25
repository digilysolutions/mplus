<?php

namespace App\Services;

use App\Models\Business;
use App\Repositories\BusinessRepository;

class BusinessServcice extends BaseService
{
    protected      BusinessRepository $repo;
    public function __construct(BusinessRepository $businessRepo)
    {
        $this->repo = $businessRepo;
        parent::__construct($businessRepo);
    }
    public function findBussinesId($id)
    {
        return $this->repo->findRepoBussinesId($id);
    }
}
