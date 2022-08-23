<?php

namespace App\Http\Controllers;

use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller
{
    public function login(Request $request, Student $student)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $user = $student->where('email', '=', $request->input('email'))->first();

        if ($user) {
            if (Hash::check($request->input('password'), $user->password)) {
                $request->session()->put('loginId', $user->id);
                $request->session()->put('status', 'active');
                $request->session()->put('user', "{$user->first_name} {$user->last_name}");

                return redirect('student');
            } else {
                $request->session()->put('status', 'inActive');
                return back()->with("fail", 'Password not match');
            }
        }

        $request->session()->put('status', 'inActive');

        return back()->with("fail", 'Login details are not valid');
    }

    public function signup(Student $student, Request $request)
    {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'class' => 'required',
            'email' => 'required|email|unique:students',
            'password' => 'required',
            'confirmPassword' => 'required|same:password'
        ]);

        $student->first_name = $fname = $request->input('firstName');
        $student->last_name = $lname = $request->input('lastName');
        $student->father_name = $request->input('fatherName');
        $student->mother_name = $request->input('motherName');
        $student->email = $email = $request->input('email');
        $student->class = (int)$request->input('class');
        $student->password =  Hash::make($request->input('password'));

        if ($student->save()) {
            $request->session()->put('status', "active");
            $request->session()->put('user', "$fname $lname");
            $request->session()->put('mail', $email);

            return redirect('student');
        }

        return redirect("signup")->with('fail', 'Something went worng. Try again with carefully.');
    }
}
