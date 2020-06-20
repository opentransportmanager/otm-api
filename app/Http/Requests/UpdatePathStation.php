<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdatePathStation extends AttachStationsToPath
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'travel_time' => $rules['*.travel_time'].'|required',
        ];
    }
}
