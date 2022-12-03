<?php

namespace App\Http\Requests\Games;

use Illuminate\Foundation\Http\FormRequest;

class ShowGamesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'page'            => ['required', 'integer'],

            'limit'           => ['required', 'integer', 'nullable'],

            'search'          => ['present'],

            'genres'          => ['present'],
            'genres.*'        => ['array:id'],
            'genres.*.id'     => ['integer'],

            'developers'      => ['present'],
            'developers.*'    => ['array:id'],
            'developers.*.id' => ['integer'],
        ];
    }

    protected function prepareForValidation()
    {
    }

    public function authorize(): bool
    {
        return true;
    }
}
