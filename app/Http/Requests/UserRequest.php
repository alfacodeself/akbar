<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
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
            'avatar' => 'nullable|image|mimes:png,jpg,jpeg,svg,gif,jfif|max:5000',
            'name' => 'required',
            'username' => 'required',
            'old_password' => 'nullable',
            'new_password' => 'nullable|min:7|confirmed'
        ];
    }
}
