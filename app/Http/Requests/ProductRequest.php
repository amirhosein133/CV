<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
            'name' => ['required', 'string'],
            'price' => ['required', 'integer']
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'نوشتن نام محصول الزامیست',
            'name.string' => 'نام محصول باید از نوع رشته باشد',
            'price.required' => 'مقدار قیمت اجباری میباشد',
            'price.integer' => 'مقدار قیمت باید عددی باشد'
        ];
    }
}
