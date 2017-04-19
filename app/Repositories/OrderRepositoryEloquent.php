<?php
namespace App\Repositories;


use App\Models\Order;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderRepositoryEloquent extends BaseRepository
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

    public function get()
    {

    }

}
