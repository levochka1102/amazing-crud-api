<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GameIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'search' => ['present'],
            'limit' => ['required', 'numeric'],
            'page' => ['required', 'numeric'],
            'genres_ids' => ['present'],
            'developers_ids' => ['present'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
