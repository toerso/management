<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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

                return redirect(route('student_dash'));
            } else {
                return back()->with("fail", 'Password not match');
            }
        }else {
            return back()->with("fail", 'Not found user any account');
        }
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
            'password' => 'required|min:8',
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

            return redirect(route('student_dash'));
        }

        return redirect(route('student_signup'))->with('fail', 'Something went worng. Try again with carefully.');
    }

    public function update(Request $request, Student $student) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'class' => 'required|min:1|max:12',
            'email' => 'required|email'
        ]);

        $first_name = $request->input('firstName');
        $last_name = $request->input('lastName');
        $father_name = $request->input('fatherName');
        $mother_name = $request->input('motherName');
        $email = $request->input('email');
        $class = $request->input('class');

        if(Session::has('status') && Session::get('status') === 'active') {
            $isUpdated = false;

            

            if(Session::has('loginId')) {
                $isUpdated = $student->where('id', '=', Session::get('loginId'))->update(compact('first_name', 'last_name', 'father_name', 'mother_name', 'email', 'class'));
            }else if(Session::has('mail')) {
                $isUpdated = $student->where('email', '=', Session::get('mail'))->update(compact('first_name', 'last_name', 'father_name', 'mother_name', 'email', 'class'));
            }

            if($isUpdated) {
                Session::pull('edit');
                Session::put('user', "$first_name $last_name");
                Session::put('mail', $email);

                return redirect(route('student_dash'))->with('success', 'Updated your profile successfully.');
            }

            return redirect(route('student_profile_update'))->with('fail', 'Failed to update your profile. Try again with carefully.');
        }

        return back();
    }
}
