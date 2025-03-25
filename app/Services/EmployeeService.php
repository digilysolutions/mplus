<?php

namespace App\Services;

use App\Repositories\AttributeRepository;
use App\Repositories\EmployeeRepository;

class EmployeeService extends BaseService
{

    public function __construct(EmployeeRepository $employeeRepo)
    {
        parent::__construct($employeeRepo);
    }   
}
