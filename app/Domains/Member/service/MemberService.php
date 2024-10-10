<?php

namespace App\Domains\Member\service;

use App\Domains\Member\repository\MemberRepositoryInterface;
use App\Domains\Member\dto\MemberStoreDto;
use App\Exceptions\MomssiServiceException;
use Illuminate\Support\Facades\Hash;
use App\Models\Member;

class MemberService implements MemberServiceInterface
{
    public function __construct(private readonly MemberRepositoryInterface $memberRepository) {}

    public function register(MemberStoreDto $dto)
    {
        $member = new Member();
        $member->name = $dto->getName();
        $member->email = $dto->getEmail();
        $member->password = Hash::make($dto->getPassword());
//        $member->

        try {
            if ($this->memberRepository->findByEmail($member->email)) {
                throw new MomssiServiceException('email already exists.');
            }

            $member = $this->memberRepository->save($member);
        } catch (\Exception $e) {
            throw new MomssiServiceException('failed to register. ' . $e->getMessage());
        }

        return $member;
    }
}
