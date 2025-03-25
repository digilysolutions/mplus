<?php

namespace App\Services;

use App\Repositories\TermsRepository;

class TermsService extends BaseService
{

    protected     TermsRepository $repo;
    public function __construct(TermsRepository $termsRepo)
    {
        $this->repo = $termsRepo;
        parent::__construct($termsRepo);
    }   

    public function findByAttributeId(int $attributeId)
    {
        return $this->repo->findByAttributeId($attributeId);
    }
}
