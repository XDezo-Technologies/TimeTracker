<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontendController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\TasksController;
use App\Http\Controllers\ForgotPasswordController;

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
    return view('auth.login');
});




// backend//
// Route::post('/createProject', 'ProjectController@create');



// Show the login form
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

// Handle the login form submission
Route::post('/login', [LoginController::class, 'login']);

// Show the registration form
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');

// Handle the registration form submission
Route::post('/register', [RegisterController::class, 'register']);


Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('password.request');
Route::post('/forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'resetPassword'])->name('password.update');



Route::middleware('custom_auth')->group(function () {
    // Add your protected routes here
    Route::get('/ok', [frontendController::class, 'ok'])->name('ok');
    Route::get('/dashboard', [frontendController::class, 'index'])->name('dashboard');
    Route::get('/projects', [frontendController::class, 'showProject'])->name('projects');
    Route::get('/tasks', [frontendController::class, 'showTask'])->name('tasks');
    Route::get('/profile', [frontendController::class, 'profilepage'])->name('profile');
    Route::post('tasks/{task}/start', [TasksController::class, 'startTimer'])->name('tasks.start');
    Route::post('tasks/{task}/stop', [TasksController::class, 'stopTimer'])->name('tasks.stop');

    Route::resource('tasks', TasksController::class);

    Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
    Route::get('/reset', [LoginController::class, 'showResetView'])->name('reset');
    Route::post('/resetpassword', [LoginController::class, 'resetPassword'])->name('resetpassword');
    Route::post('/createProject', [ProjectController::class, 'create'])->name('createProject');
    Route::post('/createTask1', [ProjectController::class, 'createTask1'])->name('createTask1');
    Route::post('/createTask', [ProjectController::class, 'createTask'])->name('createTask');
    Route::get('/vprojects/{project_id}', [ProjectController::class, 'viewProject'])->name('vprojects');
    Route::get('/editprojects/{id}', [ProjectController::class, 'editProject'])->name('editprojects');
    Route::get('/editProfile', [LoginController::class, 'editProfile'])->name('editProfile');
    Route::put('/updateProfile', [LoginController::class, 'updateProfile'])->name('updateProfile');
    Route::put('/updateProjects/{id}', [ProjectController::class, 'updateProjects'])->name('updateProjects');
    Route::get('/edittasks/{id}', [TasksController::class, 'edittasks'])->name('edittasks');
    Route::post('/start-time/{id}', [TasksController::class, 'startCountdown'])->name('start.time');
    Route::post('/stop-time/{id}', [TasksController::class, 'stopCountdown'])->name('stop.time');

    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('deleteprojects');

});


// Add your protected routes here
