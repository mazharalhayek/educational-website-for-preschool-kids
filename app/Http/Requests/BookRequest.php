<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules;


class BookRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'title' => ['required', 'string'],
            'author' => ['required', 'string'],
            'description' => ['required', 'string'],
            'price' => ['required', 'integer'],
            'Cover' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'],
            'PDF' => ['required', 'file', 'mimes:pdf', 'max: 4096'],
            'rating'=>['required','numeric','max:5','min:0.5']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], 422));
    }
}
