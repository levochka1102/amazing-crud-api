<?php

namespace App\Http\Requests\Genres;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int page
 * @property int limit
 * @property string search
 */
class GenresIndexRequest extends FormRequest
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
