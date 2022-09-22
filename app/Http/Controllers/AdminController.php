<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

                return redirect(route('admin_dash'));
            } else {
                return back()->with("fail", 'Password not match');
            }
        }

        return back()->with("fail", 'Login details are not valid');
    }

    public function signup(Admin $admin, Request $request) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email|unique:admins',
            'password' => 'required|min:8',
            'confirmPassword' => 'required|same:password'
        ]);

        $admin->first_name = $fname = $request->input('firstName');
        $admin->last_name = $lname = $request->input('lastName');
        $admin->email = $email = $request->input('email');
        $admin->password = Hash::make($request->input('password'));

        if ($admin->save()) {
            $request->session()->put('status', "active");
            $request->session()->put('user', "$fname $lname");
            $request->session()->put('mail', $email);
            $request->session()->put('role', 'admin');

            return redirect(route('admin_dash'));
        }

        return back()->with('fail', 'Something went worng. Try again with carefully.');
    }

    public function update(Request $request, Admin $admin) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'email' => 'required|email'
        ]);

        $first_name = $request->input('firstName');
        $last_name = $request->input('lastName');
        $email = $request->input('email');

        if (Session::has('status') && Session::get('status') === 'active') {
            $isUpdated = false;

            if (Session::has('loginId')) {
                $isUpdated = $admin->where('id', '=', Session::get('loginId'))->update(compact('first_name', 'last_name', 'email'));
            } else if (Session::has('mail')) {
                $isUpdated = $admin->where('email', '=', Session::get('mail'))->update(compact('first_name', 'last_name', 'email'));
            }

            if ($isUpdated) {
                Session::pull('edit');
                Session::put('user', "$first_name $last_name");

                return redirect(route('admin_profile'))->with('success', 'Updated your profile successfully.');
            }

            return redirect(route('admin_profile'))->with('fail', 'Failed to update your profile. Try again with carefully.');
        }

        return back();
    }
}
