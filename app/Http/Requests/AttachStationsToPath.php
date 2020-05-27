<?php

declare(strict_types=1);

namespace App\Http\Requests;

class AttachStationsToPath extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            '*.id' => 'required|exists:stations,id|distinct',
            '*.travel_time' => 'integer|min:0|max:60',
        ];
    }
}
