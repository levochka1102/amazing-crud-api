<?php

namespace App\Http\Requests\Developers;

use Illuminate\Foundation\Http\FormRequest;

class DevelopersIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page' => ['required', 'numeric'],
            'limit' => ['required', 'numeric'],
            'search' => ['present'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
