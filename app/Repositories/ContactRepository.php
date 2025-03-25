<?php

namespace App\Repositories;

use App\Models\Contact;
use App\Repositories\BaseRepository;

class ContactRepository extends BaseRepository
{
    public function __construct(Contact $model)
    {
        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'email',
        'family_number',
        'alternate_number',
        'mobile',
        'phone',
        'is_activated',
        'location_id'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Contact::class;
    }
    public function findRepoContactMobile($mobile)
    {
        return  Contact::where('mobile', $mobile)->first();
    }
}
