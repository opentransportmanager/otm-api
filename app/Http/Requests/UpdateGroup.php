<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdateGroup extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|min:3|max:25',
        ];
    }
}
