<?php

// +----------------------------------------------------------------------
// | desc
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

namespace App\Services\Admin;


use App\Repositories\OrderRepositoryEloquent;

class OrderService
{
    private $order;

    public function __construct(OrderRepositoryEloquent $order)
    {
        $this->order = $order;
    }
    
}