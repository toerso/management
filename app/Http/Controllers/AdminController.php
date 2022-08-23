<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function login(Request $request, Admin $admin) {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $admin->where('email', '=', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                $request->session()->put('loginId', $user->id);
                $request->session()->put('status', 'active');
                $request->session()->put('user', "{$user->first_name} {$user->last_name}");
                $request->session()->put('role', "admin");

                return redirect('admin');
            } else {
                $request->session()->put('status', 'inActive');
                return back()->with("fail", 'Password not match');
            }
        }

        $request->session()->put('status', 'inActive');

        return back()->with("fail", 'Login details are not valid');
    }

    public function signup(Admin $admin, Request $request) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required',
            'confirmPassword' => 'required|same:password'
        ]);

        $admin->first_name = $request->input('firstName');
        $admin->last_name = $request->input('lastName');
        $admin->email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        $admin->save();

        return redirect('admin');
    }
}
