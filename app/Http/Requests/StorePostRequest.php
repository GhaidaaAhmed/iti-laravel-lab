<?php

namespace App\Http\Requests;

use App\Rules\only3posts;
use Illuminate\Foundation\Http\FormRequest;


class StorePostRequest extends FormRequest
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
            'title' => 'required|min:3|unique:posts,title',
            'description'=>'required|min:10',
            'user_id' => new only3posts,
            
        ];
    }
    public function messages()
{
    return [
        'title.required' => 'A title is required',
        'description.required'  => 'A description is required',
        'user_id.exists'=>'unvalid User'
    ];
}
}
