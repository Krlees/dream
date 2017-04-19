<?php
namespace App\Repositories;


use App\Models\OrderProduct;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderProductRepositoryEloquent extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderProduct::class;
    }

    public function get()
    {

    }

}
