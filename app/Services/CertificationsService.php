<?php

namespace App\Services;

use App\Repositories\CertificationsRepository;

class CertificationsService extends BaseService
{

    public function __construct(CertificationsRepository $certificationsRepo)
    {
        parent::__construct($certificationsRepo);
    }   
}
