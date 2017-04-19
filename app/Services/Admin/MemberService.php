<?php

// +----------------------------------------------------------------------
// | desc
// +----------------------------------------------------------------------
// | @Authoer Krlee
// +----------------------------------------------------------------------

namespace App\Services\Admin;


use App\Repositories\MemberRepositoryEloquent;

class MemberService
{
    private $member;

    public function __construct(MemberRepositoryEloquent $member)
    {
        $this->member = $member;
    }

}