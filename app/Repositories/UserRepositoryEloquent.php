<?php
namespace App\Repositories;

use App\Models\User;
use Prettus\Repository\Eloquent\BaseRepository;

class UserRepositoryEloquent extends BaseRepository
{

    public function model()
    {
        // TODO: Implement model() method.
        return User::class;
    }

    /**
     * ajax获取权限数据
     *
     * @param $offset
     * @param $limit
     * @param bool $sort
     * @param $order
     * @param array $where
     * @return array
     */
    public function ajaxUserList($offset, $limit, $sort=false, $order, $where = [])
    {
        $sort = $sort ?: $this->model->getKeyName();

        $rows = $this->model->where($where)->orderBy($sort,$order)->offset($offset)->limit($limit)->get()->toArray();

        $total = $this->model->where($where)->count();

        return compact('rows', 'total');
    }

    public function getroleSelects($id)
    {
        return $this->model->where(['pid'=>$id])->get(['name','pid','id','display_name']);
    }

    /**
     * 返回用户的权限
     *
     * @param $user
     * @return Array
     */
    public function getrole($user)
    {
        $roles = User::find($user->id);
        if( !$roles){
            return [];
        }
        $roles = $roles->roles()->get(['name'])->toArray();

        return $roles;
    }


}

