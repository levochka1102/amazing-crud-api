<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeveloperIndexRequest extends FormRequest
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
