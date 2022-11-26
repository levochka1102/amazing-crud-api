<?php

namespace App\Http\Requests;

use App\Search\Payloads\SearchOnlyPayload;
use App\Search\RequestData;
use Illuminate\Foundation\Http\FormRequest;

/**
 * @property int page
 * @property int limit
 * @property string search
 */
class GenreIndexRequest extends FormRequest
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
