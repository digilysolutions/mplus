<?php

namespace App\Repositories;

use App\Models\StatusOrder;
use App\Models\Stock;
use App\Repositories\BaseRepository;

class StatusOrderRepository extends BaseRepository
{
    public function __construct(Stock  $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'status',
        'description',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return StatusOrder::class;
    }
}
