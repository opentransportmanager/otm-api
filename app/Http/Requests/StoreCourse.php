<?php

declare(strict_types=1);

namespace App\Http\Requests;

class StoreCourse extends UpdateCourse
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        $rules = parent::rules();

        return [
            'path_id' => $rules['path_id'].'|required',
            'group_id' => $rules['group_id'].'|required',
            'start_time' => $rules['start_time'].'|required',
        ];
    }
}
