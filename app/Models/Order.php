<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'order';

    protected $primaryKey = 'id';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'order_sn', 'amount', 'pay_sn', 'pay_type', 'status', 'member_id'
    ];
}
