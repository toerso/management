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
Route::get('/', [SiteController::class, 'index'])->name('welcome');


//sign out route
Route::get('/signout', [SiteController::class, "signout"])->name('signout');

//edit cancel route
Route::get('/edit_cancel', [SiteController::class, "editCancel"])->name('edit_cancel');

//student route group
Route::prefix('student')->group(function () {
    //dash board route
    Route::get('/dashboard', [SiteController::class, "studentDashBoard"])->name('student_dash');

    //student log in route
    Route::get('/login', [SiteController::class, 'studentLogin'])->name('student_login');
    Route::post('/login', [StudentController::class, 'login'])->name('student_login');

    //student sign up route
    Route::get('/signup', [SiteController::class, 'studentSignup'])->name('student_signup');
    Route::post('/signup', [StudentController::class, 'signup'])->name('student_signup');

    Route::prefix('profile')->group(function () {
        //student update
        Route::get('/update', [SiteController::class, "studentUpdate"])->name('student_profile_update');
        Route::post('/update', [StudentController::class, "update"])->name('student_profile_update');
    });
});

//admin route group
Route::prefix('admin')->group(function () {
    //admin sign up route
    Route::get('/signup', [SiteController::class, 'adminSignup'])->name('admin_signup');
    Route::post('/signup', [AdminController::class, 'signup'])->name('admin_signup');

    //admin log in route
    Route::get('/login', [SiteController::class, 'adminLogin'])->name('admin_login');
    Route::post('/login', [AdminController::class, 'login'])->name('admin_login');

    Route::get('/dashboard', [SiteController::class, "adminDashBoard"])->name('admin_dash');

    Route::get('/student/{id}', [SiteController::class, "deleteStudent"])->name('admin_stu_del');

    Route::prefix('profile')->group(function () {
        Route::get('/', [SiteController::class, "adminProfile"])->name('admin_profile');

        Route::get('/update', [SiteController::class, "adminUpdate"])->name('admin_profile_update');
        Route::post('/update', [AdminController::class, "update"])->name('admin_profile_update');
    });

});
