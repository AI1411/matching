<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUserRequest extends FormRequest
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
            'account_name' => 'required|max:10',
            'age' => 'required|integer',
            'introduce' => 'max:255',
            'pref_id' => 'required',
            'gender' => 'required',
            'hobby' => 'required',
            'image' => 'image'
        ];
    }
}
