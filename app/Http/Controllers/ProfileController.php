<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $admin = User::firstOrFail();
        return view('app.settings.profile', compact('admin'));
    }
    public function store(UserRequest $request)
    {
        $admin = User::firstOrFail();
        // dd($request->validated());
        try {
            $data = [
                'name' => $request->name,
                'username' => $request->username
            ];
            if ($request->hasFile('avatar')) {
                if ($admin->avatar != null) @unlink(public_path($admin->avatar));
                $thumb = 'admin-' . Str::random(10) . '.' . $request->file('avatar')->extension();
                $store = $request->file('avatar')->storeAs('public/admins', $thumb);
                $path = Storage::url($store);
                $data['avatar'] = $path;
            }

            if ($request->has('old_password') && $request->old_password != null) {
                if (!Hash::check($request->old_password, $admin->password)) {
                    return back()->withErrors(['old_password' => 'Old Password Incorrect']);
                }
                if ($request->new_password == null) {
                    return back()->withErrors(['new_password' => 'New Password is required!']);
                }
                $data['password'] = bcrypt($request->new_password);
            }
            $admin->update($data);
            return redirect()->route('profile.index')->with('success', 'Success update profile');
        } catch (\Throwable $th) {
            return redirect()->route('profile.index')->with('error', $th->getMessage());
        }
    }
}
