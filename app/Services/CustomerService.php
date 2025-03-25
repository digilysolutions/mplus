<?php

namespace App\Services;

use App\Repositories\CustomerRepository;

class CustomerService extends BaseService
{
    protected      CustomerRepository $repo;
    public function __construct(CustomerRepository $customerRepo)
    {
        $this->repo = $customerRepo;
        parent::__construct($customerRepo);
    }  
    
    public function findRepoCustomerId($id)
    {
        return $this->repo->findRepoCustomer($id);
    }   
}
