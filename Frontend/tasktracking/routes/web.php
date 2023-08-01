<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

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



Route::get('/ok', [frontendController::class, 'ok'])->name('ok');
Route::get('/dashboard', [frontendController::class, 'index'])->name('dashboard');
Route::get('/profile', [frontendController::class, 'profilepage'])->name('profile');


// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login']);


Route::post('/logout', [LoginController::class, 'logout'])->name('logout');




// Show the registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Handle the registration form submission
Route::post('/register', [RegisterController::class, 'register']);
