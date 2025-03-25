<?php

namespace App\Repositories;

use App\Models\Warehouse;
use App\Repositories\BaseRepository;

class WarehouseRepository extends BaseRepository
{
    public function __construct(Warehouse $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'description',
        'location_id',
        'inventory_manager',
        'phone',
        'email',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Warehouse::class;
    }
}
