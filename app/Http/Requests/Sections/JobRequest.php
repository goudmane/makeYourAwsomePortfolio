<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'company' => 'required|string|max:255',
            'location' => 'required|string|max:255',
            'range' => 'required|string|max:255',
            'url' => 'nullable|url',
            'highlights' => 'required|array',
            'highlights.*' => 'string',
            'metadata' => 'nullable|array'
        ];
    }
}