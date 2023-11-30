<?php

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

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/home', function() {
//     return view('home');
// });

use App\Http\Controllers\homeController;

Route::get('/home', [homeController::class, 'show'])->name('home');
Route::post('/login', [homeController::class, 'login'])->name('login.post');
Route::get('/structure', function(){
    return view('structure');
});


use App\Http\Controllers\DashboardController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'show'])->name('dashboard');
});

use App\Http\Controllers\UserController;
Route::get('/insert', [UserController::class, 'insertUser']);

use App\Http\Controllers\profileController;

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('/profile', [profileController::class, 'show'])->name('profile');
});

Route::get('/profile/edit', [UserController::class, 'editBio'])->name('editBio');
Route::patch('/profile/updateBio', [UserController::class, 'updateBio'])->name('updateBio');

Route::group(['middleware' => ['web']], function () {
    Route::post('/update-profile', [UserController::class, 'updateProfile'])->name('updateProfile');
});




