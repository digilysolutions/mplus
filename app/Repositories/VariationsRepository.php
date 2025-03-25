<?php

namespace App\Repositories;

use App\Models\Variations;
use App\Repositories\BaseRepository;

class VariationsRepository extends BaseRepository
{
    public function __construct(Variations $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',        
        'stock_id',   
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Variations::class;
    }
}
