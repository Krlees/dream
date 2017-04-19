<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'category';

    protected $primaryKey = 'id';

    protected $guarded = [];
}
