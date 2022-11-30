<?php

namespace App\Http\Requests\Developers;

use App\Models\Developer;
use Illuminate\Foundation\Http\FormRequest;

class StoreDevelopersRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'min:2', 'string', 'unique:' . Developer::class],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
