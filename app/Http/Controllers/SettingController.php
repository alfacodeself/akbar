<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Support\Str;
use App\Http\Requests\SettingRequest;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('app.settings.general', compact('setting'));
    }
    public function store(SettingRequest $request)
    {
        $setting = Setting::firstOrFail();
        try {
            if ($request->hasFile('logo')) {
                if ($setting->logo != null) @unlink(public_path($setting->logo));
                $thumb = 'setting-' . Str::random(10) . '.' . $request->file('logo')->extension();
                $store = $request->file('logo')->storeAs('public/settings', $thumb);
                $path = Storage::url($store);
            }else {
                $path = $setting->logo;
            }
            $data = $request->validated();
            $data['logo'] = $path;
            $setting->update($data);
            return redirect()->route('settings.index')->with('success', 'Success update setting');
        } catch (\Throwable $th) {
            return redirect()->route('settings.index')->with('error', $th->getMessage());
        }
    }

}
