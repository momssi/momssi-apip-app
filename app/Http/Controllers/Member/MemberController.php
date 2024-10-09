<?php

namespace App\Http\Controllers\Member;

use App\Domains\Member\service\MemberServiceInterface;
use App\Domains\Member\request\MemberStoreRequest;
use App\Domains\Member\resource\MemberResource;
use App\Domains\Member\dto\MemberStoreDto;
use App\Http\Controllers\Controller;

class MemberController extends Controller
{
    public function __construct(
        private readonly MemberServiceInterface $memberService
    ) {}

    public function store(MemberStoreRequest $request):MemberResource
    {
        /** @var MemberStoreDto $dto */
        $dto = $request->toDto();
        $member = $this->memberService->register($dto);

        return new MemberResource($member);
    }

}
