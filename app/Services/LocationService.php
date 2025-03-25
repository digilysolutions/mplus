<?php

namespace App\Services;

use App\Repositories\LocationRepository;

class LocationService extends BaseService
{
    protected      LocationRepository $repo;

    public function __construct(LocationRepository $locationRepo)
    {
        $this->repo = $locationRepo;
        parent::__construct($locationRepo);
    }
    public function findRepoLocation($name, $zip_code, $address,$municipality_id)
    {
        return $this->repo->findRepoLocation($name, $zip_code, $address,$municipality_id);
    }
}
