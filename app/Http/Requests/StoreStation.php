<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreStation extends UpdateStation
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'name' => $rules['name'],
            'position' => $rules['position'],
        ];
    }
}
