<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function(){
//Dashboard
Route::get('/dashboard', [App\Http\Controllers\dashboard\DashboardController::class, 'index'])->name('dashboard');

//Users
Route::get('/dashboard/users', [App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.user'); // Unique name for index
Route::get('/dashboard/user/create', [App\Http\Controllers\dashboard\UserController::class, 'create'])->name('dashboard.user.create'); // Unique name for index
Route::post('/dashboard/user', [App\Http\Controllers\dashboard\UserController::class, 'store'])->name('dashboard.user.store'); // Unique name for index
Route::get('/dashboard/user/edit/{user}', [App\Http\Controllers\dashboard\UserController::class, 'edit'])->name('dashboard.user.edit'); // Unique name for edit
Route::put('/dashboard/user/edit/{user}', [App\Http\Controllers\dashboard\UserController::class, 'update'])->name('dashboard.user.update'); // Unique name for update
Route::delete('/dashboard/user/delete/{user}', [App\Http\Controllers\dashboard\UserController::class, 'destroy'])->name('dashboard.user.delete'); // Unique name for delete

//Student
Route::get('/dashboard/students', [App\Http\Controllers\dashboard\StudentController::class, 'index'])->name('dashboard.students'); // Unique name for index
Route::get('/dashboard/students/create', [App\Http\Controllers\dashboard\StudentController::class, 'create'])->name('dashboard.students.create'); // Unique name for edit
Route::post('/dashboard/students', [App\Http\Controllers\dashboard\StudentController::class, 'store'])->name('dashboard.students.store'); // Unique name for update
Route::delete('/dashboard/students/{student}', [App\Http\Controllers\dashboard\StudentController::class, 'destroy'])->name('dashboard.students.delete'); // Unique name for delete
Route::get('/dashboard/students/edit/{student}', [App\Http\Controllers\dashboard\StudentController::class, 'edit'])->name('dashboard.students.edit');
Route::put('/dashboard/students/edit/{student}', [App\Http\Controllers\dashboard\StudentController::class, 'update'])->name('dashboard.students.update');
Route::get('/dashboard/students/show/{student}', [App\Http\Controllers\dashboard\StudentController::class, 'show'])->name('dashboard.students.show');
//Jurusan
Route::get('/dashboard/jurusan', [App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.jurusan'); // Unique name for index
Route::get('/dashboard/jurusan/edit/{id}', [App\Http\Controllers\dashboard\UserController::class, 'edit'])->name('dashboard.jurusan.edit'); // Unique name for edit
Route::post('/dashboard/jurusan/update/{id}', [App\Http\Controllers\dashboard\UserController::class, 'update'])->name('dashboard.jurusan.update'); // Unique name for update
Route::delete('/dashboard/jurusan/delete/{id}', [App\Http\Controllers\dashboard\UserController::class, 'destroy'])->name('dashboard.jurusan.delete'); // Unique name for delete

//Admin
Route::get('/dashboard/admin', [App\Http\Controllers\dashboard\UserController::class, 'index'])->name('dashboard.admin'); // Unique name for index
Route::get('/dashboard/admin/edit/{id}', [App\Http\Controllers\dashboard\UserController::class, 'edit'])->name('dashboard.admin.edit'); // Unique name for edit
Route::post('/dashboard/admin/update/{id}', [App\Http\Controllers\dashboard\UserController::class, 'update'])->name('dashboard.admin.update'); // Unique name for update
Route::delete('/dashboard/admin/delete/{id}', [App\Http\Controllers\dashboard\UserController::class, 'destroy'])->name('dashboard.admin.delete'); // Unique name for delete
});
