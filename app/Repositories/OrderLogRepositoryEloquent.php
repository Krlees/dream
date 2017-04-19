<?php
namespace App\Repositories;


use App\Models\OrderLog;
use Prettus\Repository\Eloquent\BaseRepository;

class OrderLogRepositoryEloquent extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return OrderLog::class;
    }

    public function get()
    {

    }

}
