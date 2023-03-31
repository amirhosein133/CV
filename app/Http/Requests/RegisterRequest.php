<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
        $result = [
            'validation' => 'in:on,off'
        ];
        if ($this->request->all()['validation'] == 'on') {
            $result['token'] = ['required', 'min:6', 'max:6'];
        } else {
            $result['name'] = ['required'];
            $result['mobile'] = ['required'];
            $result['email'] = ['required', 'email'];

        }
        return $result;
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'پر کردن این فیلد اجباری است.',
            'mobile.required' => 'پر کردن این فیلد اجباری است',
            'email.email' => 'این فیلد باید به صورت ایمیل باشد.',
            'email.required' => 'پر کردن این فیلد اجباری است.',
            'token.required' => 'پر کردن این فیلد اجباری است',
            'token.min' => 'حتما باید 6 کاراکتر باشد.',
            'token.max' => 'حتما باید 6 کاراکتر باشد.'
        ];
        return $messages;
    }


}
