<?php

namespace App\Repositories;

use App\Models\Business;
use App\Repositories\BaseRepository;


class BusinessRepository extends BaseRepository
{
    public function __construct(Business $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'logo',
        'description',
        'industry',
        'owner_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }
    public function model(): string
    {
        return Business::class;
    }
    public function findRepoBussinesId($id)
    { 
        return  Business::with('employees.person','employees.person_status')->find($id);
    }
}
