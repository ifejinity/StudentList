<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\UserController;
use App\Models\Students;
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

// default route
// Route::get('/', function () {
//     return view('welcome');
// });

// user route
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/{id}', [UserController::class, 'showUser']);

// students route
// Route::get('/students/{id}',[StudentController::class, 'show']);

Route::get('/',[StudentController::class, 'index'])->middleware('auth');
Route::get('/login', [UserController::class, 'login'])->name('login')->middleware('guest');
Route::post('/login/process', [UserController::class, 'process']);
Route::get('/register', [UserController::class, 'register'])->middleware('guest');
Route::post('/store', [UserController::class, 'store'])->middleware('guest');
Route::post('/logout', [UserController::class, 'logout']);  

//Student
Route::match(['post', 'get'], '/add/student', [StudentController::class, 'store'])->middleware('auth');
Route::view('/add', 'students.addstudent')->middleware('auth');
Route::post('/search',[StudentController::class, 'show'])->middleware('auth');
Route::delete('/delete/{id}', [StudentController::class, 'delete'])->middleware('auth');

Route::prefix('edit')->middleware(['auth', 'auth'])->group(function() {
    Route::get('/{id}', [StudentController::class, 'edit']);
    Route::put('/student/{id}', [StudentController::class, 'update']);
});