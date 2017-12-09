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

    public function validatePlan($givenPlan)
    {
        $plans = ['7.00', '12.00', '17.00', '22.00'];

        foreach ($plans as $plan) {
            if ($givenPlan == $plan) {
                return true;
            }
        }

        return false;
    }
}