<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorApplicationRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'subject' => 'required|min:5|max:255',
            'message' => 'required',
            'file' => 'file|mimes:jpg,png,pdf'
        ];
    }
}
