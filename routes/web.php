<?php

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

use App\Adviser;
use App\Student;


Route::get('/', function () {
  $advisers_count = Adviser::where([['status', '=', '1'], ['lec_id', '<>', '01'],])->count();
  $student_count = Student::all()->count();
  return view('home', ['page' => 'home', 'advisers_count' => $advisers_count, 'student_count' => $student_count]);
});

/*Route::get('/advisers', function () {
    return view('advisers.home', ['page' => 'adviser']);
});

Route::get('/students', function () {
    return view('students.home', ['page' => 'student']);
});*/


Route::resource('/advisers', 'AdviserController');

Route::resource('/students', 'StudentController');
