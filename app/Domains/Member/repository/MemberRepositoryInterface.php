<?php

namespace App\Domains\Member\repository;

use App\Models\Member;

interface MemberRepositoryInterface
{
    public function save(Member $member);

    public function findByEmail(string $email);
}
