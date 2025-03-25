<?php

namespace App\Repositories;

use App\Models\PersonStatus;
use App\Repositories\BaseRepository;

class PersonStatusRepository extends BaseRepository
{
    public function __construct(PersonStatus $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'description',
        'is_activated'    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return PersonStatus::class;
    }
}
