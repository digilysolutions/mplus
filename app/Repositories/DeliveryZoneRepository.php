<?php

namespace App\Repositories;

use App\Models\DeliveryZone;
use App\Repositories\BaseRepository;

class DeliveryZoneRepository extends BaseRepository
{
    public function __construct(DeliveryZone $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'location_id',
        'id',
        'price',
        'delivery_time',
        'time_unit'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }
    public function model(): string
    {
        return DeliveryZone::class;
    }
    public function allWithLocalityProducts()
    {
        return $this->model::with('location', 'products')->get();
    }
}
