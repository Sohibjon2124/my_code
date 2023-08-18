<?php

namespace App\Http\Requests\Admin\User;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string|email|unique:users',
            'password' => 'required|string',
            'role' => 'required|string',
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
            'password.required' => 'this poly is required',
            'password.string' => 'Password must string',
        ];
    }
}
