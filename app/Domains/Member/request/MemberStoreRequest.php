<?php

namespace App\Domains\Member\request;

use Illuminate\Foundation\Http\FormRequest;
use App\Domains\Member\dto\MemberStoreDto;
use App\Domains\DtoTrait;

class MemberStoreRequest extends FormRequest
{
    use DtoTrait;

    public function rules():array
    {
        return [
            'name' => 'required|string',
            'email' => 'required|email|max:256',
            'password' => 'required|string|max:256',
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
