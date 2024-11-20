<?php

namespace App\Http\Requests\Sections;

use Illuminate\Foundation\Http\FormRequest;

class HeroRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'items' => 'required|array',
            'items.*.tag' => 'required|string',
            'items.*.text' => 'required|string',
            'items.*.class' => 'nullable|string',

            'metadata' => 'nullable|array'
        ];
    }
}
