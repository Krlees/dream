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

    public function ajaxList($param)
    {
        $where = [];
        if (isset($param['search'])) {
            $where = [
                ['order_sn', 'like', "%{$param['search']}%", 'or'],
                ['pay_sn', 'like', "%{$param['search']}%", 'or'],
            ];
        }

        return $this->order->ajaxPageList($param['offset'], $param['limit'], $param['sort'], $param['order'], $where);

    }
    
}