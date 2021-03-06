<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
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
            'name'=> 'required|unique:clients',
            'phone'=> 'required|digits:11'
            // 'phone'=> 'required|numeric|size:10'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => "Client's name is required",
            'name.unique'  => "A client's name must be unique",
        ];
    }
}
