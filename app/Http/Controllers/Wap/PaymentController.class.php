<?php

namespace App\Http\Controllers\Wap;

// +----------------------------------------------------------------------
// | 支付
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

use App\Services\Wap\PaymentService;
use Illuminate\Http\Request;

class PaymentController
{

    private $payment;
    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }

    public function wxpay(Request $request)
    {
        if ($request->ajax()) {
            $data = $request->input('data');



        } else {



            $reponse = $this->returnFormFormat('添加菜单', $this->formField);
            return view('admin/menu/add', compact('reponse'));
        }
    }
}