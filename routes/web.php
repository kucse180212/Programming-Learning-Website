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
Route::get('/timer', function () {
    return view('timer');
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::middleware(['auth:sanctum', 'verified'])->get('/1stpageforadmin', function () {
    return view('1stpage_for_admin');
})->name('1stpageforadmin');



Route::middleware(['auth:sanctum', 'verified'])->get ('/create_questionaries', function (){
    return view ('createquestionnaire');
});

Route::middleware(['auth:sanctum', 'verified'])->post('/questionaires','App\Http\Controllers\StudentController@questionnairestore');
Route::middleware(['auth:sanctum', 'verified'])->get('/document_redirect/{post_id}','App\Http\Controllers\StudentController@document_redirect')->name('document_redirect');

Route::middleware(['auth:sanctum', 'verified'])->get('/create_questionaires/{post_id}','App\Http\Controllers\StudentController@create_questionairesstore');

Route::middleware(['auth:sanctum', 'verified'])->get('/createpost/{post_id}',[
    'uses'=>'App\Http\Controllers\StudentController@addquestion',
    'as'=>'addquestion'
]);
Route::middleware(['auth:sanctum', 'verified'])->get('/createpost1/{post_id}',[
    'uses'=>'App\Http\Controllers\StudentController@addquestion_all',
    'as'=>'addquestion_all'
]);

Route::get ('pythonhome/{post_id}','App\Http\Controllers\StudentController@pythonhome')->name('pythonhome');
Route::get ('python_basic/{post_id}','App\Http\Controllers\StudentController@python_basic');
Route::get ('python_t1/{post_id}','App\Http\Controllers\StudentController@python_t1');

Route::get ('python_video/{post_id}','App\Http\Controllers\StudentController@python_video');

Route::get ('python_doc/{post_id}','App\Http\Controllers\StudentController@python_document');

Route::middleware(['auth:sanctum', 'verified'])->get('/document/{post_id}','App\Http\Controllers\StudentController@doc');


Route::middleware(['auth:sanctum', 'verified'])->post('/adddocument/{post_id}',[
    'uses'=>'App\Http\Controllers\StudentController@adddocument',
    'as'=>'adddocument'
]);


Route::post('/submit_answer/{time_check}/{id}','App\Http\Controllers\StudentController@checkquestion');
Route::post('/submit_all_answer/{time_check}/{id}','App\Http\Controllers\StudentController@check_all_question');

Route::post('/check_mail/{post_id}','App\Http\Controllers\MailController@sendMail');

Route::get ('admin/home',[HomeController::class,'adminHome'])->name('admin.home')->middleware('is_admin');