<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FormSeriesRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

 
    public function rules(): array
    {
        return [
            'nome' => ['required', 'min:3'],
        ];
    }
}
