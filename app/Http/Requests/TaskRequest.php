<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'working_id' => 'required|integer',
            'title' => 'required|string',
            'description' => 'required|string',
            'deadline' => 'required|date',
        ];
    }
}
