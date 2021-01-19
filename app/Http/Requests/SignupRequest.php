<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SignupRequest extends FormRequest
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
            'name'=>'required|min:2',
            'email'=>'required|email|unique:users,email',
            'password'=>'required|min:6|max:10|confirmed',

        ];
    }

    // create own messages of errrors in validation
    public function messages()
    {
        return [
            "email.required"=>'אימייל הוא שדה חובה',
            "email.email"=>'שדה זה חייב אימייל חוקי',
            "password.required"=>'הסיסמה היא שדה חובה',
        ];
    }
}
