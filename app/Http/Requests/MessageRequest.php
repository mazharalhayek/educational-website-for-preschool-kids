<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

class MessageRequest extends FormRequest
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
            'senderId'=>['integer','exists:users,id'],
            'receiverId'=>['integer','exists:users,id'],
            'content'=>['required','string','profanity'],
            'readStatus'=>['boolean']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $customMessages = [
            'content.profanity' => 'You have been added to the blacklist due to sending bad words!!',
        ];
    
        // Merge the custom messages with the existing messages
        $validator->messages()->merge($customMessages);
        return redirect()->back()->withErrors($validator)->withInput();
    }
}
