<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
        $regex = '/^09(1[0-9]|9[0-2]|2[0-2]|0[1-5]|41|3[0,3,5-9])\d{7}$/';
        $result = [
            'validation' => 'in:on,off'
        ];
        if($this->request->all()['validation'] == 'on'){
            $result['token'] = ['required' , 'min:6' , 'max:6'];
        }else{
            $result['mobile'] = ['required'];
           if(isset($this->request->all()['email'])){
               $result['email'] = ['email'];
           }
        }
        return $result;
    }

    public function messages()
    {
        $messages = [
            'mobile.required' => 'پر کردن این فیلد اجباری است',
            'mobile.regex' => 'لطفا در پر کردن اطلاعات دقت کنید.',
            'email.email' => 'این فیلد باید به صورت ایمیل باشد.',
            'token.required' => 'پر کردن این فیلد اجباری است',
            'token.min' => 'حتما باید 6 کاراکتر باشد.',
            'token.max' => 'حتما باید 6 کاراکتر باشد.'];
        return $messages;
    }
}
