<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BLogNewRequest extends FormRequest
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
            
            'title' => 'required|regex:/^[A-Za-z?0-9. -]+$/',
            'blog_image' => 'required',
            'description' => 'required'
        ];
    }
}
