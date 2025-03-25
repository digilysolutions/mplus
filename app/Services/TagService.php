<?php

namespace App\Services;

use App\Repositories\TagRepository;

class TagService extends BaseService
{
    protected      TagRepository $repo;
    public function __construct(TagRepository $tagRepo)
    {
        $this->repo = $tagRepo;
        parent::__construct($tagRepo);
    }

    public function searchTagsService($query)
    {
        return  $this->repo->searchTagsRepo($query);
    }
}
