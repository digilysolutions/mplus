<?php

namespace App\Repositories;

use App\Models\Customer;
use App\Models\Person;
use App\Repositories\BaseRepository;

class CustomerRepository extends BaseRepository
{
    public function __construct(Customer $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [

        'id',
        'is_activated',
        'person_id',
        'person_statuses_id',
        'person_statuses_message',
        'billingAddress',
        'shippingAddress',
        'creditCardNumber',
        'creditCardExpirationDate',
        'creditLimit'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Customer::class;
    }
    public function findRepoCustomer($id)
    { 
        return  Customer::with('billingAddress','shippingAddress')->findOrFail($id);
        
    }

}
