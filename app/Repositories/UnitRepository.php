<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository
{
    public function __construct(Unit $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',     
        'shortname',    
        'unit_id',  
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Unit::class;
    }
}
