<?php

use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Route::get('/master', function () {
//     return view('master');
// });

// Route::get('/create', function () {
//     return view('teacher.create');
// });

// Route::get('/index', function () {
//     return view('teacher.index');
// });

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('teacher', TeacherController::class);

Route::resource('student', StudentController::class);