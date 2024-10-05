<?php

namespace App\Domains\Member\repository;

use App\Domains\AbstractRepository;
use App\Domains\Member\service\MemberServiceInterface;
use App\Models\Member;

class MemberRepository extends AbstractRepository implements MemberServiceInterface
{
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }
}
