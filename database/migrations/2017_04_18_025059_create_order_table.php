<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order', function (Blueprint $table) {
            $table->increments('id');
            $table->string('order_sn',20)->unique();
            $table->decimal('amount')->comment('总价格');
            $table->string('pay_sn',40)->comment('支付单号');
            $table->string('pay_type',12)->comment('支付方式')->default('wxpay');
            $table->tinyInteger('status')->comment('状态，1待付款，2待评价 3已完成');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order');
    }
}
