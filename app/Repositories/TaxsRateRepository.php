<?php

namespace App\Repositories;

use App\Models\TaxsRate;
use App\Repositories\BaseRepository;

class TaxsRateRepository extends BaseRepository
{
    public function __construct(TaxsRate $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'amount',
        'business_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return TaxsRate::class;
    }
}
