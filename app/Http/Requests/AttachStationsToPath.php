<?php

declare(strict_types=1);

namespace App\Http\Requests;

class AttachStationsToPath extends DetachStationsFromPath
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            '*.id' => $rules['*.id'],
            '*.travel_time' => 'integer|min:0|max:60',
        ];
    }
}
