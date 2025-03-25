<?php

namespace App\Services;

use App\Repositories\ContactRepository;

class ContactService extends BaseService
{
    protected      ContactRepository $repo;
    public function __construct(ContactRepository $contactRepo)
    {  $this->repo = $contactRepo;
        parent::__construct($contactRepo);
    }   
    public function findRepoContactMobile($mobile)
    {
        return $this->repo->findRepoContactMobile($mobile);
    }
}
