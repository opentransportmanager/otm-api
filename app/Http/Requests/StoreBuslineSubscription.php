<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreBuslineSubscription extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'user_id' => 'required|exists:users,id|distinct',
            'busline_id' => 'required|exists:buslines,id|distinct',
        ];
    }
}
