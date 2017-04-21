<?php

namespace App\Http\Controllers\Wap;

// +----------------------------------------------------------------------
// | 支付
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

use App\Services\Wap\PaymentService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentController extends BaseController
{

    private $payment;
    public function __construct(PaymentService $payment)
    {
        $this->payment = $payment;
    }

    public function wxpay()
    {
        $products = $this->payment->getAllProducts();
        return view('wap/wxpay', compact('products'));
    }
}