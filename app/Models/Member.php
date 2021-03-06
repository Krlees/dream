<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    /**
     * 与模型关联的数据表
     *
     * @var string
     */
    protected $table = 'member';

    protected $primaryKey = 'id';

    protected $guarded = [];

}
