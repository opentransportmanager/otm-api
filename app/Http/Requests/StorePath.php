<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StorePath extends UpdatePath
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'busline_id' => $rules['busline_id'],
        ];
    }
}
