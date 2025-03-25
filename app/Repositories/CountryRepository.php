<?php

namespace App\Repositories;

use App\Models\Country;
use App\Repositories\BaseRepository;

class CountryRepository extends BaseRepository
{
    public function __construct(Country $model) {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'name',
        'id',
        'is_activated'
    ];
  
    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Country::class;
    }

    public function withProvince($id)  
    {  
        return $this->model::with('provinces')->find($id);  
    } 

}
