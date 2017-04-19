<?php
namespace App\Repositories;


use App\Models\Product;
use Prettus\Repository\Eloquent\BaseRepository;

class ProductRepositoryEloquent extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Product::class;
    }

    public function get()
    {

    }

}
