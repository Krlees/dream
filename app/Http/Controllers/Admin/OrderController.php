<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Services\Admin\OrderService;
use Illuminate\Http\Request;

class OrderController extends BaseController
{
    private $order;
    public function __construct(OrderService $order)
    {
        $this->order = $order;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            // 过滤参数
            $param = $this->cleanAjaxPageParam($request->all());
            $results = $this->order->ajaxList($param);

            return $this->responseAjaxTable($results['total'], $results['rows']);

        } else {
            $reponse = $this->returnSearchFormat(url('admin/order/index'), false, [
                'viewUrl' => url('admin/order/detail'),
                'autoSearch' => true
            ]);

            return view('admin/order/index', compact('reponse'));
        }

    }

    public function detail($id)
    {

    }

}
