<?php

namespace App\Repositories;

use App\Models\Rating;
use App\Repositories\BaseRepository;

class RatingRepository extends BaseRepository
{
    public function __construct(Rating $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'rating',
        'business_id',
        'product_id',
        'date',
        'writer_id',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Rating::class;
    }
}
