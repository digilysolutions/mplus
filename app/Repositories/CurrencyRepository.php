<?php

namespace App\Repositories;


use App\Models\Currency;
use App\Repositories\BaseRepository;

class CurrencyRepository extends BaseRepository
{
    public function __construct(Currency $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'country',
        'currency',
        'path_flag',
        'code',
        'symbol',
        'thousand_separator',
        'decimal_separator',
        'is_activated',
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Currency::class;
    }
}
