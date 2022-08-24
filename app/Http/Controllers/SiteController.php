<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller {

     public function index() {
          if(Session::has('status') && Session::has('role')) return redirect(route('admin_dash'));
          
          if(Session::has('status')) {
               return redirect(route('student_dash'));
          }

          return view('welcome');
     }

     public function adminLogin() {
          return view('pages.login')->with(['title' => 'admin login', 'routeName' => 'admin_login']);
     }

     public function adminSignup() {
          return view('pages.admin_signup');
     }

     public function studentLogin() {

          return view('pages.login')->with(['title' => 'student login', 'routeName' => 'student_login']);
     }

    public function studentSignup() {

          return view('pages.signup');
    }

    public function adminDashBoard(Admin $admin, Student $student) {
          $user = [];

          if (Session::has('status') && Session::get('status') === 'active') {
               if (Session::has('mail')) {
                    $user = $admin->where('email', '=', Session::get('mail'))->first();
               } else if (Session::has('loginId')) {
                    $user = $admin->where('id', '=', Session::get('loginId'))->first();
               }

               $students = $student->all();

               return view('pages.a_dashboard')->with(compact('user', 'students'));
          }

          return redirect(route('admin_login'));
    }

     public function studentDashBoard(Student $student) {
          $user = [];

          if(Session::has('status') && Session::get('status') === 'active') {
               if(Session::has('mail')) {
                    $user = $student->where('email', '=', Session::get('mail'))->first();
               }else if(Session::has('loginId')) {
                    $user = $student->where('id', '=', Session::get('loginId'))->first();
               }

               

               return view('pages.s_dashboard')->with(compact('user'));
          }

          return redirect(route('student_login'));
     }

     protected function _handleAdminWithData() {

     }

     public function signout() {
          Session::flush();
          return redirect(route('welcome'));
     }

     public function studentUpdate() {
          Session::put('edit', true);

          return redirect(route('student_dash'));
     }

     public function adminUpdate() {
          Session::put('edit', true);

          return redirect(route('admin_profile'));
     }

     public function editCancel() {
          if(Session::has('edit')) {
               Session::pull('edit');
          }

          if(Session::has('role')) {
               return redirect(route('admin_profile'));
          }
          
          return redirect(route('student_dash'));
     }

     public function adminProfile(Admin $admin) {
          $user = [];
          $adminProfile = true;

          if (Session::has('status') && Session::get('status') === 'active') {
               if (Session::has('mail')) {
                    $user = $admin->where('email', '=', Session::get('mail'))->first();
               } else if (Session::has('loginId')) {
                    $user = $admin->where('id', '=', Session::get('loginId'))->first();
               }

               return view('pages.a_dashboard')->with(compact('user', 'adminProfile'));
          }

          return redirect(route('admin_login'));
     }

     public function deleteStudent(Student $student, $id) {
          if (Session::has('status') && Session::has('role')) {
               $student->where('id', '=', $id)->delete();
          }

          return redirect(route('admin_dash'));
     }
}
