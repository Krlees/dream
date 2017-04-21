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

    public function ajaxPageList($offset, $limit, $sort = false, $order, $where = [])
    {
        $sort = $sort ?: $this->model->getKeyName();
        $rows = $this->model->where($where)->orderBy($sort, $order)->offset($offset)->limit($limit)->get()->toArray();
        $total = $this->model->where($where)->count();

        return compact('rows', 'total');
    }

}
