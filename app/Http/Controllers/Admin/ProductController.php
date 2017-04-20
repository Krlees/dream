<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\BaseController;
use App\Presenters\Admin\ProductPresenter;
use App\Services\Admin\ProductService;
use Illuminate\Http\Request;

class ProductController extends BaseController
{
    private $product;

    public function __construct(ProductService $product)
    {
        $this->product = $product;
    }

    public function index(Request $request)
    {
        if ($request->ajax()) {

            // 过滤参数
            $param = $this->cleanAjaxPageParam($request->all());

            $results = $this->product->ajaxList($param);

            return $this->responseAjaxTable($results['total'], $results['rows']);

        } else {
            $reponse = $this->returnSearchFormat(url('admin/product/index'), false, [
                'addUrl' => url('admin/product/add'),
                'editUrl' => url('admin/product/edit'),
                'removeUrl' => url('admin/product/del'),
                'autoSearch' => true
            ]);

            return view('admin/product/index', compact('reponse'));
        }
    }

    /**
     * 添加视图
     * @Author Krlee
     *
     */
    public function add(Request $request, ProductPresenter $presenter)
    {

        if ($request->isMethod('post')) {

            $data = $request->all();
            $results = $this->product->createData($data['data']);

            return $results ? $this->responseData(0, "操作成功", $results) : $this->responseData(200, "操作失败");

        } else {

            $this->returnFieldFormat('text', '产品名称', 'data[name]');
            $this->returnFieldFormat('text', '价格', 'data[price]');
            $this->returnFieldFormat('text', '展示方式', 'data[show_type]');
            $this->returnFieldFormat('radio', '状态', 'data[status]', [
                [
                    'text' => '正常',
                    'value' => '1',
                    'checked' => true,
                ],
                [
                    'text' => '关闭',
                    'value' => '0',
                ]
            ]);

            $classSelects = $this->product->getTopCateSelects();
            $extendField = $presenter->classSelect($classSelects);

            $reponse = $this->returnFormFormat('添加商品', $this->formField);
            $reponse['extendField'] = $extendField;

            return view('admin/product/add', compact('reponse'));
        }

    }

    /**
     * 编辑视图
     * @Author Krlee
     *
     */
    public function edit($id, Request $request, ProductPresenter $presenter)
    {
        if ($request->isMethod('post')) {
            $data = $request->all();

            $results = $this->product->updateData($data['data'], $id);

            return $results ? $this->responseData(0, "操作成功", $results) : $this->responseData(200, "操作失败");

        } else {

            $info = $this->product->getProduct($id);

            $this->returnFieldFormat('text', '产品名称', 'data[name]', $info->name);
            $this->returnFieldFormat('text', '价格', 'data[price]', $info->price);
            $this->returnFieldFormat('text', '展示方式', 'data[show_type]', $info->show_type);
            $this->returnFieldFormat('radio', '状态', 'data[status]', [
                [
                    'text' => '正常',
                    'value' => '1',
                ],
                [
                    'text' => '关闭',
                    'value' => '0',
                ]
            ]);

            $classSelects = $this->product->getTopCateSelects();
            $extendField = $presenter->classSelect($classSelects);

            $reponse = $this->returnFormFormat('编辑产品', $this->formField);
            $reponse['extendField'] = $extendField;

            return view('admin/product/edit', compact('reponse', 'info'));
        }

    }

    /**
     * 删除
     * @Author Krlee
     *
     */
    public function delete()
    {

    }

}
