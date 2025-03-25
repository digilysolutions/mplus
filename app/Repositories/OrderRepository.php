<?php

namespace App\Repositories;

use App\Models\Order;
use App\Models\Owner;
use App\Repositories\BaseRepository;

class OrderRepository extends BaseRepository
{
    public function __construct(Owner $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'person_id',
        'person_statuses_id',
        'person_statuses_message',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Order::class;
    }
}
