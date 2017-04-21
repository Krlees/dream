<?php

namespace App\Http\Controllers\Api;

use App\Services\Api\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    private $order;

    public function __construct(OrderService $order)
    {
        parent::__construct();
        $this->order = $order;
    }

    public function create(Request $request)
    {
        $ids = $request->input('ids') or $this->responseApi(1004);
        $amount = $request->input('amount') or $this->responseApi(1004);

        $member_id = session('wechat.oauth_user.id');

        $result = $this->order->create(compact('ids', 'amount', 'member_id'));
        $result ? $this->responseApi(0) : $this->responseApi(9000);
    }

}
