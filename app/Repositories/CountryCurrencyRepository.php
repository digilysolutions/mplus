<?php

namespace App\Repositories;

use App\Models\CountryCurrency;
use App\Models\Currency;
use App\Repositories\BaseRepository;

class CountryCurrencyRepository  extends BaseRepository
{
    public function __construct(CountryCurrency $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'currency_id',
         'country_id',
         'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return CountryCurrency::class;
    }
}
