<?php

// +----------------------------------------------------------------------
// | desc
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

namespace App\Services\Admin;


use App\Repositories\ProductRepositoryEloquent;

class ProductService
{
    private $product;

    public function __construct(ProductRepositoryEloquent $product)
    {
        $this->product = $product;
    }
    
}