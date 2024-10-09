<?php

namespace App\Domains\Member\resource;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Request;
use App\Models\Member;

class MemberResource extends JsonResource
{
    public function toArray(Request $request)
    {
        /** @var Member $resource */
        $resource = $this->resource;

        return [
            'name' => $resource->name,
            'email' => $resource->email,
        ];
    }
}
