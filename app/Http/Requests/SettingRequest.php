<?php

namespace App\Http\Requests;

use App\Models\Setting;
use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
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
        $setting = Setting::first();
        return [
            'logo' => $setting->logo == null ? 'required' : 'nullable' . '|image|mimes:png,jpg,jpeg,jfif,svg,gif|max:5000',
            'merchant' => 'required',
            'owner' => 'required',
            'phone_number' => 'required|numeric|digits_between:9,15',
            'address' => 'required|min:5',
            'lat' => 'required',
            'lng' => 'required',
            'facebook' => 'required',
            'instagram' => 'required',
            'whatsapp' => 'required|numeric|digits_between:9,15'
        ];
    }
}
