<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class AuthController extends Controller {

   public function signup(Student $student, Request $request) {
        $request->validate([
            'firstName' => 'required',
            'lastName' => 'required',
            'fatherName' => 'required',
            'motherName' => 'required',
            'class' => 'required',
            'email' => 'required|email',
            'password' => 'required',
        ]);
        
        $data = $request->all();

        dd($data);
   }
}
