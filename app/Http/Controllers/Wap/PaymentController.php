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
            return view('wap/wxpay');
        }
    }
}