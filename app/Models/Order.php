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

    protected $guarded = [];
}
