<?php

namespace App\Repositories;

use App\Models\Tag;
use App\Repositories\BaseRepository;

class TagRepository extends BaseRepository
{
    public function __construct(Tag  $model)
    {

        parent::__construct($model);
    }
    protected $fieldSearchable = [
        'id',
        'name',
        'is_activated'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tag::class;
    }

    public function searchTagsRepo($query)
    {    
        // Busca las etiquetas que contengan el texto en el nombre
        return Tag::where('name', 'like', '%' . $query . '%')->get();         
        
    }
}
