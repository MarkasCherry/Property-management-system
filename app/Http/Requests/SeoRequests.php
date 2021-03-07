<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SeoRequests extends FormRequest
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
            'seo_h1_title' => 'required',
            'seo_meta_title' => 'required',
            'seo_meta_description' => 'required',
        ];
    }
}
