<?php

namespace App\Http\Requests\Dashboard\Core;

use Illuminate\Foundation\Http\FormRequest;

class RealEstateRequest extends FormRequest
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
            'street'        =>  'required|string|max:255',
            'file_number'   =>  'required|string|max:255|unique:real_estates',
            'estate_number' =>  'required|string|max:255',
            'side_id'       =>  'required|numeric|exists:sides,id',
        ];
    }

    public function messages()
    {
        return [
            'file_number.unique'    =>  __('This file number already exists in the database')
        ];
    }
}
