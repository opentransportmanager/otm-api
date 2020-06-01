<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreUser extends UpdateUser
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'name' => $rules['name'],
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ];
    }
}
