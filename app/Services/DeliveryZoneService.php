<?php

namespace App\Services;

use App\Repositories\DeliveryZoneRepository;

class DeliveryZoneService extends BaseService
{
    protected      DeliveryZoneRepository $repo;
    public function __construct(DeliveryZoneRepository $deliveryZoneRepo)
    {
         $this->repo = $deliveryZoneRepo;
        parent::__construct($deliveryZoneRepo);
    }
    public function allWithLocalityProducts()
    {
        return $this->repo->allWithLocalityProducts();
    }

}
