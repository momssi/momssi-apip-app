<?php

namespace App\Domains\Member\service;

use App\Domains\Member\dto\MemberStoreDto;

interface MemberServiceInterface
{
    public function register(MemberStoreDto $dto);

}
