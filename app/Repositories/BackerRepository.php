<?php 

namespace ActivismeBe\Repositories;

use ActivismeBe\Backer;
use ActivismeBE\DatabaseLayering\Repositories\Contracts\RepositoryInterface;
use ActivismeBE\DatabaseLayering\Repositories\Eloquent\Repository;

/**
 * Class BackerRepository
 *
 * @package ActivismeBe\Repositories
 */
class BackerRepository extends Repository
{
    /**
     * Set the eloquent model class for the repository.
     *
     * @return string
     */
    public function model()
    {
        return Backer::class;
    }
}