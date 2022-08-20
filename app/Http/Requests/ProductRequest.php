<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        if (request()->routeIs('products.store')) {
            $rule = 'required';
        }elseif (request()->routeIs('products.update')) {
            $rule = 'nullable';
        }
        return [
            'thumbnail' => $rule . '|image|mimes:png,jpg,jpeg,svg,jfif,gif|max:5000',
            'name' => 'required',
            'category' => 'required',
            'description' => 'required|min:5',
            'stock' => 'required|numeric|min:0',
            'galleries.*' => $rule . '|image|mimes:png,jpg,jpeg,svg,jfif,gif|max:5000',
        ];
    }
}
