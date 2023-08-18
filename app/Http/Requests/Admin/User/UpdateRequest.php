<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name'=>'string|required',
            'email'=>'string|required|email|unique:users,email,'.$this->user_id,
            'user_id'=>'required|integer|exists:users,id',
            'role'=>'string|required',
        ];
    }

    public function messages()
    {
        return [

            'name.required' => 'this poly is required',
            'name.string' => 'this poly must be string',
            'email.string' => 'this poly must be string',
            'email.required' => 'this poly must be string',
            'email.email' => 'this poly must be email',
            'email.unique' => 'This email already exists',
        ];
    }
}
