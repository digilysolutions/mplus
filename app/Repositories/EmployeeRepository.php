<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Models\Employee;
use App\Models\TypeContact;
use App\Repositories\BaseRepository;

class EmployeeRepository extends BaseRepository
{
    public function __construct(Employee $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'person_id',
        'person_statuses_message',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Employee::class;
    }

}
