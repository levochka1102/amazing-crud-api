<?php

namespace App\Http\Requests;

use App\Models\Developer;
use Illuminate\Foundation\Http\FormRequest;

class StoreDeveloperRequest extends FormRequest
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
