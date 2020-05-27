<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdatePath extends BaseRequest
{
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
