<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class StoreChildrenRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'name'=>['required','string','min:5','max:20','unique:childrens,name'],
            'age'=>['required','integer','min:2','max:8'],
            'password' => ['required', 'confirmed','min:4'],
        ];
    }

    //if there is an error with the validation display the error as a Json response.
    protected function failedValidation(Validator $validator)
    {
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
