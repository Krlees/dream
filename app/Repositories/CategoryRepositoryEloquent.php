<?php
namespace App\Repositories;


use App\Models\Category;
use Prettus\Repository\Eloquent\BaseRepository;

class CategoryRepositoryEloquent extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Category::class;
    }

    public function getTopCategory()
    {
        return $this->model->where('pid',0)->get();
    }

}
