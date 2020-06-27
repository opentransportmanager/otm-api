<?php

declare(strict_types=1);

namespace App\Http\Requests;

class AuthenticationRequest extends BaseRequest
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
            'email' => 'required|email|string',
            'password' => 'required|string',
        ];
    }
}
