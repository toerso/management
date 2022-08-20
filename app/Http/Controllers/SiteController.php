<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SiteController extends Controller {

   public function index() {
        return view('welcome');
   }

   public function login() {
        return view('pages.login');
   }

    public function signup()
    {
        return view('pages.signup');
    }
}
