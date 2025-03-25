<?php

namespace App\Repositories;

use App\Models\Terms;
use App\Repositories\BaseRepository;

class TermsRepository extends BaseRepository
{
    public function __construct(Terms $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'attribute_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Terms::class;
    }
    public function findByAttributeId(int $attributeId)
    {
        return Terms::where('attribute_id', $attributeId)->get();
    }
}
