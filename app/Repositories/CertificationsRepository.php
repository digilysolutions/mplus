<?php

namespace App\Repositories;

use App\Models\Certifications;
use App\Repositories\BaseRepository;


class CertificationsRepository extends BaseRepository
{
    public function __construct(Certifications $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'description',       
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }
    public function model(): string
    {
        return Certifications::class;
    }
}
