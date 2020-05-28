<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreCourse extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'path_id' => 'required|integer|exists:paths,id',
            'group_id' => 'required|integer|exists:groups,id',
            'start_time' => 'required|date_format:'.config('formats.hours_minutes'),
        ];
    }
}
