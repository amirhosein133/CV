<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
            'name' => 'required',
            'description' => 'required'
        ];
    }

    public function messages()
    {
        $messages = [
            'name.required' => 'فیلد نام حتما باید پر شود',
            'description.required' => 'فیلد توضیحات حتما باید پر شود'
        ];
        return $messages;
    }
}
