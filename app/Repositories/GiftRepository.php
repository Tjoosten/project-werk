<?php 

namespace ActivismeBe\Repositories;

use ActivismeBe\Gift;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class GiftRepository
 *
 * @package ActivismeBe\Repositories
 */
class GiftRepository extends Repository
{

    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Gift::class;
    }
}