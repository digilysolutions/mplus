<?php

namespace App\Repositories;

use App\Models\UnitBase;
use App\Repositories\BaseRepository;

class UnitBaseRepository extends BaseRepository
{
    public function __construct(UnitBase $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return UnitBase::class;
    }
}
