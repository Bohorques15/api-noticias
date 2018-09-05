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

Route::post('user/register', 'APIRegisterController@register');
Route::post('user/login', 'APILoginController@login');
Route::get('noticias/{id}', 'NoticiaController@noticia');
Route::get('noticias/all', 'NoticiaController@obtener_noticias');
Route::post('noticias/crear', 'NoticiaController@crear_noticia');
Route::put('noticias/crear', 'NoticiaController@actualizar_noticia');
Route::delete('noticias/eliminar', 'NoticiaController@borrar_noticia');


Route::middleware('jwt.auth')->get('users', function(Request $request) {
    return auth()->user();
});
