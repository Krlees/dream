<?php

namespace App\Http\Controllers\Api;


class CallbackController extends BaseController
{
    //
    public function wxpay()
    {
        $xml = $GLOBALS['HTTP_RAW_POST_DATA'];
        $arr = array2xml($xml);

        // 调起微信支付成功并且用户支付成功
        if( $arr['return_code'] == 'SUCCESS' && $arr['result_code'] == 'SUCCESS'){
            M('order')->where(['order_sn'=>$arr['out_trade_no']])->save(['pay_sn'=>$arr['transaction_id'],'status'=>3]);
        }

        echo <<<EoT
            <xml>
              <return_code><![CDATA[SUCCESS]]></return_code>
              <return_msg><![CDATA[OK]]></return_msg>
            </xml>
EoT;


    }
}
