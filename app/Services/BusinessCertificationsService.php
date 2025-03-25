<?php

namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\BusinessCertificationsRepository;

class BusinessCertificationsService extends BaseService
{
   
    public function __construct(BusinessCertificationsRepository $businessCertificationsRepo)
    {
        parent::__construct($businessCertificationsRepo);
    }   
}
