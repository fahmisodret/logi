<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AboutRequest extends FormRequest
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
            'name' => 'required',
            'title' => 'required',
            // 'image' => 'required|file|mimes:jpeg,png,jpg,gif,svg|max:3000', // max 3MB,
            'image' => 'file|mimes:jpeg,png,jpg,gif,svg|max:2000', // max 3MB,
            'fb' => 'required',
            'twitter' => 'required',
            'in' => 'required',
        ];
    }

    /**
     * Custom message for validation
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name' => 'Name is required!',
            'title' => 'Judul is required!',
            // 'image.required' => 'Image is required!', 
            'image.file' => 'Image is not file!', 
            'image.max' => 'Image max is 3mb!', 
            'image.mimes' => 'Image type valid is "jpeg,png,jpg,gif,svg"!', 
            'fb' => 'Facebook is required!',
            'twitter' => 'Twitter is required!',
            'in' => 'LinkedIn is required!',
        ];
    }
}
