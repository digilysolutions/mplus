<?php

namespace App\Services;

use App\Repositories\ReviewsRepository;


class ReviewsService extends BaseService
{
    protected     ReviewsRepository $repo;
    public function __construct(ReviewsRepository $reviewsRepo)
    {
        $this->repo = $reviewsRepo;
        parent::__construct($reviewsRepo);
    }
    public function allWithBusiness()
    {
        return $this->repo->allWithBusiness();
    }
}
