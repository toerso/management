<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SiteController extends Controller {

     public function index() {
          return view('welcome');
     }

     public function adminLogin(Request $request) {
          return view('pages.login')->with(['title' => 'admin login', 'uri' => '/admin_login']);
     }

     public function adminSignup() {
          return view('pages.admin_signup');
     }

     public function studentLogin(Request $request) {
          return view('pages.login')->with(['title' => 'student login', 'uri'=>'/student_login']);
     }

    public function studentSignup() {
        return view('pages.signup');
    }

    public function adminDashBoard() {
          return view('pages.a_dashboard');
    }

     public function studentDashBoard(Student $student) {

          $data = [];

          if(Session::has('status') && Session::get('status') === 'active') {
               if(Session::has('mail')) {
                   $data = $student->where('email', '=', Session::get('mail'))->first();
               }else if(Session::has('loginId')) {
                    $data = $student->where('email', '=', Session::get('mail'))->first();
               }

               return view('pages.s_dashboard', compact('data'));
          }

          return redirect('student_login');
     }

     public function signout() {
          if(Session::has('status') && Session::has('role')) {
               Session::pull('role');
               $this->removeSessionData();

               return redirect('/admin_login');
          }

         $this->removeSessionData();
          return redirect('/student_login');
     }

     private function removeSessionData(): void {
          Session::pull('status');

          if (Session::has('mail')) {
               Session::pull('mail');
          }

          if (Session::has('loginId')) {
               Session::pull('loginId');
          }

          if (Session::has('user')) {
               Session::pull('user');
          }
     }
}
