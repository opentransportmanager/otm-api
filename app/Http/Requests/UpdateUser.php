<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdateUser extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:20'
        ];
    }
}
