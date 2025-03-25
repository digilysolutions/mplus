<?php

namespace App\Services;

use App\Repositories\StatusOrderRepository;

class StatusOrderService extends BaseService
{

    public function __construct(StatusOrderRepository $statusOrderRepo)
    {
        parent::__construct($statusOrderRepo);
    }   
}
