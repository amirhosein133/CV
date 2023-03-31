<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ArticleRequest extends FormRequest
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
            'name' => 'required|string',
            'description' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'این فیلد الزامیست.',
            'name.string' => 'در پر کردن اطلاعات دقت کنید.',
            'description.required' => 'این فیلد الزامیست',
        ];
    }
}
