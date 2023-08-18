<?php

namespace App\Http\Requests\Admin\Post;

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
            'title'=>'string|required',
            'content'=>'string|required',
            'preview_image'=>'nullable|file',
            'main_image'=>'nullable|file',
            'category_id'=>'required|integer|exists:categories,id',
            'tag_ids'=>'nullable|array',
            'tag_ids.*'=>'nullable|integer|exists:tags,id',
        ];
    }

    
    public function messages()
    {
        return [
            'title.required' => 'this poly is required',
            'title.string' => 'this poly must be string',
            'content.required' => 'this poly is required',
            'content.string' => 'this poly must be string',
         
        
            'preview_image.file' => 'need select file',
            'main_image.file' => 'need select file',
            'category_id.required' => 'this poly is required',
            'category_id.integer' => 'this poly must be integer',
            'category_id.exists' => 'this value dont exists in DB',
            'tag_ids.array' => 'this poly must be array',

        ];
    }
}
