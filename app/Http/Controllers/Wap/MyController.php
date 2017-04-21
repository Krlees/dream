<?php

namespace App\Http\Controllers\Wap;

// +----------------------------------------------------------------------
// | 支付
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

use App\Services\Wap\MyService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use EasyWeChat;

class MyController extends BaseController
{
    public $member;
    private $my;

    public function __construct(MyService $my)
    {
//        parent::__construct();
        $this->my = $my;
    }

    public function order()
    {
        return view('wap/my_order');
    }

    public function ajaxOrder()
    {
        $this->member = session('wechat.oauth_user');
        $result = $this->my->ajaxOrderList($this->member['id']);

        return json_encode($result);
    }
}