<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//welcome route
Route::get('/', [SiteController::class, 'index']);

//admin log in route
Route::get('/admin_login', [SiteController::class, 'adminLogin']);
Route::post('/admin_login', [AdminController::class, 'login']);

//student log in route
Route::get('/student_login', [SiteController::class, 'studentLogin']);
Route::post('/student_login', [StudentController::class, 'login']);

//student sign up route
Route::get('/signup', [SiteController::class, 'studentSignup']);
Route::post('/signup', [StudentController::class, 'signup']);

//admin sign up route
Route::get('/admin_signup', [SiteController::class, 'adminSignup']);
Route::post('/admin_signup', [AdminController::class, 'signup']);

//dash board route
Route::get('/admin', [SiteController::class, "adminDashBoard"]);
Route::get('/student', [SiteController::class, "studentDashBoard"]);

//sign out route
Route::get('/signout', [SiteController::class, "signout"]);
