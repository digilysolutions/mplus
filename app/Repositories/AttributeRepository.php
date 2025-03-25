<?php

namespace App\Repositories;

use App\Repositories\BaseRepository;
use App\Models\Attributes;

class AttributeRepository extends BaseRepository
{
    public function __construct(Attributes $model)
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
        return Attributes::class;
    }
}
