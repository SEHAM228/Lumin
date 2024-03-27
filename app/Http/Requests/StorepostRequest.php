<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorepostRequest extends FormRequest
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
            //
            'title_en' => 'required|max:200|unique:posts',
            
            'body_en' => 'required|min:5',
          
            'category_id' => 'required|numeric',
            'photo' => 'required|image|mimes:png,jpg,jpeg|max:2040',
           
        ];
    }
}
