<?php

// +----------------------------------------------------------------------
// | desc
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

namespace App\Services\Admin;


use App\Repositories\CategoryRepositoryEloquent;
use App\Repositories\ProductRepositoryEloquent;

class ProductService
{
    private $product;
    private $category;

    public function __construct(ProductRepositoryEloquent $product, CategoryRepositoryEloquent $category)
    {
        $this->product = $product;
        $this->category = $category;
    }

    public function ajaxList($param)
    {
        $where = [];
        if (isset($param['search'])) {
            $where = [
                ['name', 'like', "%{$param['search']}%", 'and'],
            ];
        }

        return $this->product->ajaxPageList($param['offset'], $param['limit'], $param['sort'], $param['order'], $where);
    }

    public function createData($data)
    {
        return $this->product->create($data);
    }

    public function updateData($data, $id)
    {
        return $this->product->update($data, $id);
    }


    public function getProduct($id)
    {
        return $this->product->find($id);
    }

    public function getTopCateSelects()
    {
        return $this->category->getTopCategory()->toArray();
    }

}