<?php
namespace App\Services\Wap;

// +----------------------------------------------------------------------
// | desc
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

class PaymentService
{
    private $product;

    public function __construct(ProductRepositoryEloquent $product)
    {
        $this->product = $product;
    }


}


