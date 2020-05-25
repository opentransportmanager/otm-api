<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreBusline extends BaseRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|alpha_num|min:1|max:5',
        ];
    }
}
