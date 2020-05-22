<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreStation extends BaseRequest
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
            'name' => 'required|string|min:3|max:50',
            'position' => 'required'
        ];
    }
}
