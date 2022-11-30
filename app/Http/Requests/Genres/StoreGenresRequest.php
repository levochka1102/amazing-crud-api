<?php

namespace App\Http\Requests\Genres;

use App\Models\Genre;
use Illuminate\Foundation\Http\FormRequest;

class StoreGenresRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'string', 'unique:' . Genre::class],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
