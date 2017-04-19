<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'product';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
