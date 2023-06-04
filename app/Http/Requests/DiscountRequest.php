<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DiscountRequest extends FormRequest
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
        if ($this->method() == 'POST') {
            return [
                'code' => 'required',
                'percent' => 'required',
                'limit' => 'required',
                'expire_time' => 'required',
                'discountable_id' => 'required',
                'discountable_type' => 'required'
            ];
        }else{
            return [
                'percent' => 'required',
                'limit' => 'required',
                'expire_time' => 'required',
                'discountable_id' => 'required',
                'discountable_type' => 'required'
            ];
        }
    }

    public function messages()
    {
        return [
            'code.required' => 'این فیلد الزامیست.',
            'percent.required' => 'این فیلد الزامیست.',
            'limit.required' => 'این فیلد الزامیست.',
            'expire_time.required' => 'این فیلد الزامیست.',
            'discountable_id.required' => 'این فیلد الزامیست.',
            'discountable_type.required' => 'این فیلد الزامیست.'
        ];
    }
}
