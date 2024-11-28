<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{

    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'agent_id' => 'nullable|exists:agents,id',
            'price' => 'nullable|numeric|min:0',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Mahsulot nomi kiritilishi shart!',
            'agent_id.exists' => 'Tanlangan agent mavjud emas!',
            'price.numeric' => 'Narx raqam bo‘lishi kerak!',
            'price.min' => 'Narx manfiy bo‘lishi mumkin emas!',
        ];
    }
}
