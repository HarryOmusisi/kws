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
/*
Route::get('/newanimal',function (){
    return view('kws/newanimal');
});
*/


Route::get('/newanimal','AnimalController@index');
Route::post('/animal/save','AnimalController@store');
Route::get('/',function (){
   return view('welcome') ;
});

//go to the new mmammal page
Route::get('/newmammal','MammalController@index');












/*This was for a lab session
    Not required for this project
*/

/*Go to the fees page*/
Route::get('/fees',function (){
   return view ('brian_mutinda/fees');
});

/*Go to the student page*/
Route::get('/student',function (){
    return view('brian_mutinda/student');
});

/*Save student form*/
Route::post('/student/save','studentController@store');

/*Save fees information*/
Route::post('/fees/save','feesController@store');

/*See all students with their info*/
Route::get('/all_students','studentController@show');

/*See a student with their payment info*/
Route::get('/student/student_detail/{id}','studentController@show_student_info');

/*Search for a student*/
Route::get('/student/search_student','studentController@search_student');

// Route::resource('model', 'controller');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
