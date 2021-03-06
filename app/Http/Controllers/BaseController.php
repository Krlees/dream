<?php
// +----------------------------------------------------------------------
// | date: 2015-06-06
// +----------------------------------------------------------------------
// | BaseController: 基础控制器
// +----------------------------------------------------------------------
// | Author: yangyifan <yangyifanphp@gmail.com>
// +----------------------------------------------------------------------


namespace App\Http\Controllers;

use App\Http\Requests;
use App\Traits\Admin\FormTraits;
use Illuminate\Http\Response;
use Illuminate\Http\Request;

class BaseController extends Controller
{
    use FormTraits;

    /**
     * 构造方法
     *
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public function __construct()
    {
        //设置错误级别
        $this->setErrorLevel();
    }

    /**
     * 设置错误级别
     *
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    private function setErrorLevel()
    {
        //如果不是debug模式，则关闭waring
        if (env('APP_DEBUG', false) == true) {
            error_reporting(E_ALL ^ E_NOTICE);
        } else {
            error_reporting(E_ALL ^ E_NOTICE ^ E_WARNING);
        }
    }

    /**
     * 统一回调
     *
     * @param $code     状态码
     * @param $msg      提示文字
     * @param $data     数据
     * @param $target   是否跳转到新页面
     * @prams $href     跳转的网址
     * @prams $cookie   需要设置的cookie数组
     * @author yangyifan <yangyifanphp@gmail.com>
     */
    public function responseData($code = 0, $msg = '', $data = [], $target = false, $href = '')
    {

        if( !$msg ){
            $msg = custom_config($code);
        }

        return response()->json([
            'code' => $code,
            'msg' => $msg,
            'data' => $data,
            'target' => $target,
            'href' => $href
        ]);
    }




    /**
     * 返回bootstrap-table需要的数据格式
     *
     * @param $total
     * @param $rows
     * @return array
     */
    public function responseAjaxTable($total, $rows)
    {
        return json_encode(compact('total', 'rows'));
    }

    /**
     * 过滤并初始化好参数,只使用于bootstrap-table的表格组件
     *
     * @param $param
     */
    public function cleanAjaxPageParam($param)
    {
        $param['offset'] = isset($param['offset']) ? $param['offset'] : 0;
        $param['limit'] = isset($param['limit']) ? $param['limit'] : 10;
        $param['sort'] = isset($param['sort']) ? $param['sort'] : false;
        $param['order'] = isset($param['order']) ? $param['order'] : 'asc';

        return $param;
    }


}