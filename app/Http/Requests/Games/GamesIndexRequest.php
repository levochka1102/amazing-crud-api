<?php

namespace App\Http\Requests\Games;

use Illuminate\Foundation\Http\FormRequest;

class GamesIndexRequest extends FormRequest
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
