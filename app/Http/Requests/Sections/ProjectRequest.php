<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class ProjectRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'order' => 'integer',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'cover' => 'nullable|string',
            'github' => 'nullable|url',
            'external' => 'nullable|url',
            'tech' => 'required|array',
            'tech.*' => 'string',
            'metadata' => 'nullable|array',
            'metadata.is_featured' => 'boolean'
        ];
    }
}