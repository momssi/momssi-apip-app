<?php

namespace App\Domains\Member\request;

use App\Domains\DtoTrait;
use App\Domains\Member\dto\MemberStoreDto;
use Illuminate\Foundation\Http\FormRequest;

class MemberStoreRequest extends FormRequest
{
    use DtoTrait;

    public function rules():array
    {
        return [
            'email' => 'required|email|max:256',
            'password' => 'required|string|max:256'
        ];
    }

    public function authorize(): bool
    {
        return true;
    }

    protected function getDtoClass():MemberStoreDto
    {
        return new MemberStoreDto();
    }
}
