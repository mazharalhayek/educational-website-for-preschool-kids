<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\Rules;

class StoreChildrenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string','min:5','max:20'],
            'age'=>['required','integer','min:2','max:8'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'image' => ['max:5120']
        ];
    }

    //if there is an error with the validation display the error as a Json response.
    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'message' => 'Validation Error',
            'errors' => $validator->errors(),
        ], 422));
    }
}
