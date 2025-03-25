<?php

namespace App\Repositories;

use App\Models\Location;
use App\Repositories\BaseRepository;

class LocationRepository extends BaseRepository
{
    public function __construct(Location $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'description',
        'zip_code',
        'city',
        'created_by',
        'address',
        'municipality_id',
        'landmark',
        'is_activated'

    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Location::class;
    }
    public function findRepoLocation($name, $zip_code, $address, $municipality_id)
    {
        return  Location::where('name', $name)
            ->orWhereNull('zip_code', $zip_code)
            ->orWhereNull('address', $address)
            ->orWhereNull('municipality_id', $municipality_id)
            ->first();
    }
}
