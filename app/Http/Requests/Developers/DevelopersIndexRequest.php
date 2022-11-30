<?php

namespace App\Http\Requests\Developers;

use Illuminate\Foundation\Http\FormRequest;

class DevelopersIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['present'],
            'limit' => ['required', 'numeric'],
            'page' => ['required', 'numeric'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
