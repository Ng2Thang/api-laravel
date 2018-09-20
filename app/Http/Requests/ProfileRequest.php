<?php

namespace App\Http\Requests;

use Validator;
use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
        return [
            'phone' => 'regex:/^(09)[0-9]{8}$/',
            'birthday' => 'before:today',
            'identity_card'=>'regex:/^[0-9]{10}$/',
            'email'=>'email'         
        ];
    }
    public function messages()
    {
        return [
            'phone.regex'=>' Phone number must has format : 0912345678',
            'birthday.before' => 'Birthday must before today',
            'identity_card.regex'=>'Identity card is a sequence number have lenght 10',
            'email.email'=>'Email invalidate '
        ];
    }
}
