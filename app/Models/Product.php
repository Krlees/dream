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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cate_id', 'name', 'price', 'show_type', 'status'
    ];

    private $foreignKey = 'cate_id';

    public function category()
    {
        return $this->hasMany('App\Models\Categoty', $this->foreignKey);
    }
}
