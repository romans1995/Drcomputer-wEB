<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SigninRequest extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ];
    }
    public function messages(){
        return [
            'email.required'=>'נא להזין כתובת אימייל ',
            'email.email' => 'נא להזין כתובת אימייל תיקנית',
            'password.required' => 'סיסמה היא שדה חובה',
            'password.min' => 'יש להזין מינימום 6 תוים',
            'password.max' => 'יש להזין מקסימום 20 תוים',
        ];

    }
}
