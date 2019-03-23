<?php

namespace App\Repositories;

use Prettus\Repository\Eloquent\BaseRepository;
use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\OrderRepository;
use App\Entities\Order;
use App\Validators\OrderValidator;

/**
 * Class OrderRepositoryEloquent.
 *
 * @package namespace App\Repositories;
 */
class OrderRepositoryEloquent extends BaseRepository implements OrderRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Order::class;
    }

    /**
    * Specify Validator class name
    *
    * @return mixed
    */
    public function validator()
    {

        return null;
    }


    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function findOrderWithRestaurantId($id)
    {
        return $this->model->with(['details', 'user'])->where('restaurant_id',$id)->where('status',0)->get();
    }

    public function findOrderHistory($id)
    {
        return $this->model->with(['details', 'user'])->where('restaurant_id',$id)->where('status',1)->orWhere('status',2)->get();
    }

    public function changeStatusToDone($id)
    {
        $this->model->where('id',$id)->update(['status' => 1]);
    }

    public function changeStatusToPaid($id)
    {
        $this->model->where('id',$id)->update(['status' => 2]);
    }
    
}
