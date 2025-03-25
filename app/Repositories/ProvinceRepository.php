<?php

namespace App\Repositories;

use App\Models\Province;
use App\Repositories\BaseRepository;

class ProvinceRepository extends BaseRepository
{
    public function __construct(Province $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'name',
        'id',
        'province_id',
        'created_by',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }
    public function model(): string
    {
        return Province::class;
    }

}
