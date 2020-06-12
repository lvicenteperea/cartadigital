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
Route::get('/dashboard', function () { return view('dashboard');
                                         })->name('dashboard');

Auth::routes();

Route::get('/',                       'HomeController@index')->name('home');
Route::get('/home',                   'HomeController@index');

Route::get('/user/edita',             'UserController@edita')->name('user.edita');
Route::post('/user/update',           'UserController@update')->name('user.update');
Route::post('/user/updatePwd',        'UserController@updatePwd')->name('user.updatePwd');
Route::get('/user/perfil',            'UserController@perfil')->name('user.perfil');
Route::get('/user/avatar/{NombFic?}', 'UserController@getImagen')->name('user.avatar');

Route::get('/emp/local/{id}',         'Emp_LocalController@index')->name('emp.local');

Route::get('mail/envia',              'MailController@envia')->name('mail.envia');

/* ****************************************************************************************************
 *  -------------------------------------------------------------------------------------------------
 *  Rutas Genéricas de HANGAR XXI
 *  -------------------------------------------------------------------------------------------------
 **************************************************************************************************** */
/*   APLICACIONES  */
Route::get('/HXXI/aplicaciones/index',                      'HXXI\AplicacionController@index')->name('hxxi.aplicaciones.index');
Route::get('/HXXI/aplicaciones/mostrar/{id}',               'HXXI\AplicacionController@mostrar')->name('hxxi.aplicaciones.mostrar');
Route::get('/HXXI/aplicaciones/editar/{hxxi_aplicacion}',   'HXXI\AplicacionController@editar')->name('hxxi.aplicaciones.editar');
Route::put('/HXXI/aplicaciones/update/{hxxi_aplicacion}',   'HXXI\AplicacionController@update')->name('hxxi.aplicaciones.update');
Route::get('/HXXI/aplicaciones/crear',                      'HXXI\AplicacionController@crear')->name('hxxi.aplicaciones.crear');
Route::post('/HXXI/aplicaciones/create',                    'HXXI\AplicacionController@create')->name('hxxi.aplicaciones.create');
Route::delete('/HXXI/aplicaciones/borrar/{hxxi_aplicacion}','HXXI\AplicacionController@delete')->name('hxxi.aplicaciones.borrar');

/*   DISPOSITIVOS  */
Route::get('/HXXI/dispositivos/index',                       'HXXI\DispositivoController@index')->name('hxxi.dispositivos.index');
Route::get('/HXXI/dispositivos/mostrar/{id}',                'HXXI\DispositivoController@mostrar')->name('hxxi.dispositivos.mostrar');
Route::get('/HXXI/dispositivos/editar/{hxxi_dispositivo}',   'HXXI\DispositivoController@editar')->name('hxxi.dispositivos.editar');
Route::put('/HXXI/dispositivos/update/{hxxi_dispositivo}',   'HXXI\DispositivoController@update')->name('hxxi.dispositivos.update');
Route::get('/HXXI/dispositivos/crear',                       'HXXI\DispositivoController@crear')->name('hxxi.dispositivos.crear');
Route::post('/HXXI/dispositivos/create',                     'HXXI\DispositivoController@create')->name('hxxi.dispositivos.create');
Route::delete('/HXXI/dispositivos/borrar/{hxxi_dispositivo}','HXXI\DispositivoController@delete')->name('hxxi.dispositivos.borrar');

/*   IDIOMAS  */
Route::get('/HXXI/idiomas/index',                  'HXXI\IdiomaController@index')->name('hxxi.idiomas.index');
Route::get('/HXXI/idiomas/mostrar/{id}',           'HXXI\IdiomaController@mostrar')->name('hxxi.idiomas.mostrar');
Route::get('/HXXI/idiomas/editar/{hxxi_idioma}',   'HXXI\IdiomaController@editar')->name('hxxi.idiomas.editar');
Route::put('/HXXI/idiomas/update/{hxxi_idioma}',   'HXXI\IdiomaController@update')->name('hxxi.idiomas.update');
Route::get('/HXXI/idiomas/crear',                  'HXXI\IdiomaController@crear')->name('hxxi.idiomas.crear');
Route::post('/HXXI/idiomas/create',                'HXXI\IdiomaController@create')->name('hxxi.idiomas.create');
Route::delete('/HXXI/idiomas/borrar/{hxxi_idioma}','HXXI\IdiomaController@delete')->name('hxxi.idiomas.borrar');

/*   TEXTOS  */
Route::get('/HXXI/textos/index',                  'HXXI\TextoController@index')->name('hxxi.textos.index');
Route::get('/HXXI/textos/mostrar/{id}',           'HXXI\TextoController@mostrar')->name('hxxi.textos.mostrar');
Route::get('/HXXI/textos/editar/{hxxi_texto}',   'HXXI\TextoController@editar')->name('hxxi.textos.editar');
Route::put('/HXXI/textos/update/{hxxi_texto}',   'HXXI\TextoController@update')->name('hxxi.textos.update');
Route::get('/HXXI/textos/crear',                  'HXXI\TextoController@crear')->name('hxxi.textos.crear');
Route::post('/HXXI/textos/create',                'HXXI\TextoController@create')->name('hxxi.textos.create');
Route::delete('/HXXI/textos/borrar/{hxxi_texto}','HXXI\TextoController@delete')->name('hxxi.textos.borrar');

/*   TEXTOS IDIOMAS */
Route::get('/HXXI/txt_idiomas/index',                  'HXXI\TextoIdiomaController@index')->name('hxxi.txt_idiomas.index');
Route::get('/HXXI/txt_idiomas/mostrar/{id}',           'HXXI\TextoIdiomaController@mostrar')->name('hxxi.txt_idiomas.mostrar');
Route::get('/HXXI/txt_idiomas/editar/{hxxi_texto_idioma}',   'HXXI\TextoIdiomaController@editar')->name('hxxi.txt_idiomas.editar');
Route::put('/HXXI/txt_idiomas/update/{hxxi_texto_idioma}',   'HXXI\TextoIdiomaController@update')->name('hxxi.txt_idiomas.update');
Route::get('/HXXI/txt_idiomas/crear',                  'HXXI\TextoIdiomaController@crear')->name('hxxi.txt_idiomas.crear');
Route::post('/HXXI/txt_idiomas/create',                'HXXI\TextoIdiomaController@create')->name('hxxi.txt_idiomas.create');
Route::delete('/HXXI/txt_idiomas/borrar/{hxxi_texto_idioma}','HXXI\TextoIdiomaController@delete')->name('hxxi.txt_idiomas.borrar');
