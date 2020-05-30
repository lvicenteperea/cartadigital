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
    return view('home');
});
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Auth::routes();
/*  Route::get('/home', 'HomeController@index')->name('home');  */
Route::get('/', 'HomeController@index')->name('home');

Route::get('/user/edita',             'UserController@edita')->name('user.edita');
Route::post('/user/update',           'UserController@update')->name('user.update');
Route::get('/user/perfil',            'UserController@perfil')->name('user.perfil');
Route::get('/user/avatar/{NombFic?}', 'UserController@getImagen')->name('user.avatar');

Route::get('/emp/local/{id}',    'Emp_LocalController@index')->name('emp.local');


Route::get('mail/envia', 'MailController@envia')->name('mail.envia');