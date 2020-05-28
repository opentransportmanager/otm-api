<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreGroup extends UpdateGroup
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'name' => $rules['name'],
        ];
    }
}
