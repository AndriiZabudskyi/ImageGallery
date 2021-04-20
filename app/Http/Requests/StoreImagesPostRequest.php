<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreImagesPostRequest extends FormRequest
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
            'images' => 'required',
            'images.*.title' => 'required',
            'images.*.tags' => 'required',
            'images.image.*' => 'image|mimes:jpeg,jpg,png,jfif,pjpeg,pjp|max:2048'
        ];
    }

    /**
     * Get the validation messages for rules that apply to the request.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'images.required' => 'At least one image is required',
            'images.*.title.required' => 'Please set titles for all images',
            'images.*.tags.required' => 'Please set tags for all images',
            'images.image.*.image' => 'Uploaded file should be image',
            'images.image.*.mimes' => 'Allowed image extensions are: .jpeg, .jpg, .png, .jfif, .pjpeg, .pjp',
            'images.image.*.max' => 'Image size should be less or equal than 2mb',
        ];
    }
}
