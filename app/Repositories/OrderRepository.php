<?php

namespace App\Repositories;

use Prettus\Repository\Contracts\RepositoryInterface;

/**
 * Interface OrderRepository.
 *
 * @package namespace App\Repositories;
 */
interface OrderRepository extends RepositoryInterface
{
    //
    public function findOrderWithRestaurantId($id);
    public function findOrderHistory($id);
    public function changeStatusToDone($id);
    public function changeStatusToPaid($id);
}
