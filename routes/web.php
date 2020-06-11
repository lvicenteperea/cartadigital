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

Route::get('/HXXI/aplicaciones/index','HXXI\AplicacionController@index')->name('hxxi.aplicaciones.index');
Route::get('/HXXI/aplicaciones/mostrar/{id}','HXXI\AplicacionController@mostrar')->name('hxxi.aplicaciones.mostrar');
Route::get('/HXXI/aplicaciones/editar/{hxxi_aplicacion}','HXXI\AplicacionController@editar')->name('hxxi.aplicaciones.editar');
Route::put('/HXXI/aplicaciones/update/{hxxi_aplicacion}','HXXI\AplicacionController@update')->name('hxxi.aplicaciones.update');
Route::get('/HXXI/aplicaciones/crear','HXXI\AplicacionController@crear')->name('hxxi.aplicaciones.crear');
Route::post('/HXXI/aplicaciones/create','HXXI\AplicacionController@create')->name('hxxi.aplicaciones.create');
Route::delete('/HXXI/aplicaciones/borrar/{hxxi_aplicacion}','HXXI\AplicacionController@delete')->name('hxxi.aplicaciones.borrar');

Route::get('/user/edita',             'UserController@edita')->name('user.edita');
Route::post('/user/update',           'UserController@update')->name('user.update');
Route::post('/user/updatePwd',        'UserController@updatePwd')->name('user.updatePwd');
Route::get('/user/perfil',            'UserController@perfil')->name('user.perfil');
Route::get('/user/avatar/{NombFic?}', 'UserController@getImagen')->name('user.avatar');

Route::get('/emp/local/{id}',         'Emp_LocalController@index')->name('emp.local');


Route::get('mail/envia', 'MailController@envia')->name('mail.envia');
