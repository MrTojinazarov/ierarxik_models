<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AgentRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }


    public function rules(): array
    {
        return [
            'parent_id'=> 'nullable|integer',
            'name' => 'required|string',
            'phone' => 'required|string'
        ];
    }
}
