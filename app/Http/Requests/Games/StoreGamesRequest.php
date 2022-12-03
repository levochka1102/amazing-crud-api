<?php

namespace App\Http\Requests\Games;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreGamesRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name'        => ['required', 'min:2', 'string', Rule::unique('games')->ignore($this->game)],
            'developer'   => ['required', 'integer'],
            'genres'      => ['required'],
            'genres.*'    => ['array:id'],
            'genres.*.id' => ['integer'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
