<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StorePath extends BaseRequest
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
            'busline_id' => 'required|exists:buslines,id',
        ];
    }
}
