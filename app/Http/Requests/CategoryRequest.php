<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequest extends FormRequest
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
        $rules = [
            'cat_name' => 'required|string|max:255',
            'cat_slug' => [
                'required',
                'string',
                'max:255',
            ],
            'description' => 'nullable|string',
            'cat_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ];

        if ($this->isMethod('post')) {
            // Store validation rules
            $rules['cat_slug'][] = 'unique:categories,cat_slug';
            //$rules['cat_image'][] = 'required';
        }

        if ($this->isMethod('put') || $this->isMethod('patch')) {
            // Update validation rules
            $rules['cat_slug'][] = Rule::unique('categories', 'cat_slug')->ignore($this->route('category'));
        }

        return $rules;
    }

    public function message(){
        return [
            'cat_name.required' => 'The Category name field is required.',
            'cat_name.string' => 'The Category name must be a string.',
            'cat_name.max' => 'The Category name may not be greater than 255 characters.',
            'cat_slug.required' => 'The Category slug field is required.',
            'cat_slug.string' => 'The Category slug must be a string.',
            'cat_slug.max' => 'The Category slug may not be greater than 255 characters.',
            'cat_slug.unique' => 'The Category slug has already been taken.',
            'description.string' => 'The Category description must be a string.',
            'cat_image.required' => 'Please upload an image.',
            'cat_image.image' => 'Uploaded file must be an image.',
            'cat_image.mimes' => 'Only JPEG, PNG, JPG, and GIF images are allowed.',
            'cat_image.max' => 'Maximum file size allowed is 2MB.',
        ];
    }
}
