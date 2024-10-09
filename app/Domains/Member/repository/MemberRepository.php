<?php

namespace App\Domains\Member\repository;

use App\Domains\Member\dto\MemberStoreDto;
use App\Domains\AbstractRepository;
use App\Models\Member;

class MemberRepository extends AbstractRepository implements MemberRepositoryInterface
{
    public function __construct(Member $model)
    {
        parent::__construct($model);
    }

    public function save(Member $member):Member
    {
        $member->save();

        return $member;
    }

    public function findByEmail(string $email):bool
    {
        return $this->getQueryBuilder()
            ->where('email', $email)
            ->exists();
    }
}
