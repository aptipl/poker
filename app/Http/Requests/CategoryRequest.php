<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
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
        return Auth::user()->type == 'admin';
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => [
                'required',
                Rule::unique('categories','name')->ignore($this->category->id),
            ],
            'banner_mobile' => 'required',
//            'banner_web' => 'required',
                'carousel_mobile' => 'required',
//            'carousel_web' => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Please enter a category.',
            'banner_mobile.required' => 'Please enter a category mobile image URL.',
//            'banner_web.required' => 'Please enter a category Web Image URL.',
            'carousel_mobile.required' => 'Please enter a category mobile carousel image URL.',
//            'carousel_web.required' => 'Please enter a category mobile web image URL.',
        ];
    }
}
