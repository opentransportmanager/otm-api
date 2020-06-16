<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdateBusline extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'number' => 'required|string|alpha_num|min:1|max:5',
        ];
    }
}
