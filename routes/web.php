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

Route::get('/', 'PagesController@dashboard')->name('pages.index')->middleware('guest');
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');



Route::middleware(['auth','admin'])->group(function(){


Route::get('admin', 'AdminController@dashboard')->name('dashboard');

// Route::get('books', 'AdminBookController@index');
// Route::get('books/create', 'AdminBookController@create');
// Route::post('books/store', 'AdminBookController@show');
// Route::get('books/{book}/edit', 'AdminBookController@edit');
// Route::put('books/{book}/update', 'AdminBookController@update');
// Route::delete('books/{book}/delete', 'AdminBookController@delete');

Route::resource('books', 'AdminBookController');
Route::resource('categories', 'AdminCategoryController')->except(['show']);
Route::resource('students', 'AdminStudentController');
Route::resource('courses', 'AdminCourseController')->except('show');

Route::get('borrow', 'AdminBorrowController@index')->name('borrow.index');
Route::get('borrow/search', 'AdminBorrowController@search')->name('borrow.search');
Route::get('borrow/create', 'AdminBorrowController@create')->name('borrow.create');
Route::post('borrow/store', 'AdminBorrowController@store')->name('borrow.store');


Route::get('return', 'AdminReturnController@index')->name('return.index');
Route::get('return-book/{id}', 'AdminReturnController@returnBook')->name('return.book');


Route::get('pdf/stats', 'PdfController@printStats')->name('print.stats');

});

Route::middleware(['auth'])->group(function(){

    //student view to borrow a book
    Route::get('student/borrow/index', 'StudentBorrowController@index')->name('student.borrow.index');
    Route::get('changepassword/create', 'ChangePasswordController@create')->name('changepassword.create');
    Route::post('changepassword/store', 'ChangePasswordController@store')->name('changepassword.store');

});



Route::get('mine',function(){
    return view('admin.mine');
});
