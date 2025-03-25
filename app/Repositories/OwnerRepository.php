<?php

namespace App\Repositories;

use App\Models\Owner;
use App\Repositories\BaseRepository;

class OwnerRepository extends BaseRepository
{
    public function __construct(Owner $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'temporary_id',
        'person_id',
        'purchase_person_id',
        'delivery_person_id',
        'status_id',
        'subtotal_amount',
        'total_amount',
        'currency',
        'exchange_rate',
        'address',
        'home_delivery',
        'delivery_fee',
        'purchase_date',
        'delivery_date',
        'delivery_time',
        'time_unit',        
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Owner::class;
    }
}
