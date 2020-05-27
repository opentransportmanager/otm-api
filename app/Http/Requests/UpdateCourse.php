<?php

declare(strict_types=1);

namespace App\Http\Requests;

class UpdateCourse extends BaseRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'path_id' => 'integer|exists:paths,id',
            'group_id' => 'integer|exists:groups,id',
            'start_time' => 'date_format:H:i',
        ];
    }
}
