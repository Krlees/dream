<?php
namespace App\Repositories;


use App\Models\Member;
use Prettus\Repository\Eloquent\BaseRepository;

class MemberRepositoryEloquent extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Member::class;
    }

    public function get()
    {

    }

}
