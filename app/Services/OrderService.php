<?php

namespace App\Services;

use App\Repositories\OrderRepository;
use App\Repositories\OwnerRepository;

class OrderService extends BaseService
{

    public function __construct(OrderRepository $orderRepo)
    {
        parent::__construct($orderRepo);
    }   
}
