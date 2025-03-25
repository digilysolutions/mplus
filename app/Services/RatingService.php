<?php

namespace App\Services;

use App\Repositories\RatingRepository;

class RatingService extends BaseService
{

    public function __construct(RatingRepository $ratingRepo)
    {
        parent::__construct($ratingRepo);
    }   
}
