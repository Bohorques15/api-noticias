<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('user', 'APIRegisterController@getall')->middleware('jwt.auth');
Route::get('user/{id}', 'APIRegisterController@getone')->middleware('jwt.auth');
Route::post('user/register', 'APIRegisterController@register');
Route::put('user/{id}', 'APIRegisterController@update')->middleware('jwt.auth');
Route::delete('user/{id}', 'APIRegisterController@delete')->middleware('jwt.auth');
Route::post('user/login', 'APILoginController@login');
Route::get('noticias/{id}', 'NoticiaController@noticia');
Route::get('noticias/fecha/{fecha_inicio}/{fecha_fin}', 'NoticiaController@noticia_fecha');
Route::get('noticias/clasificacion/{clasificacion}', 'NoticiaController@noticia_clasificacion');
Route::get('noticias/cedula/{id}', 'NoticiaController@noticia_reportero');//--------------- Probar endpoint ----------///
Route::get('noticias', 'NoticiaController@obtener_noticias');
Route::post('noticias', 'NoticiaController@crear_noticia')->middleware('jwt.auth');
Route::put('noticias/{id}', 'NoticiaController@actualizar_noticia')->middleware('jwt.auth');
Route::delete('noticias/{id}', 'NoticiaController@borrar_noticia')->middleware('jwt.auth');




Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});
