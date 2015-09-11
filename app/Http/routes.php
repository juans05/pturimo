<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/Persona',['as'=>'Persona.index','uses'=>'PersonaController@index']);
Route::get('/PersonaTotal/[id]',['as'=>'Persona.show','uses'=>'PersonaController@show']);


//////Rutas Usuario
Route::post('/usuario_Registro',['as'=>'usuario.store','uses'=>'UsuarioController@store']);
Route::post('/usuario_Verificacion',['as'=>'usuario.verificacionDesesion','uses'=>'UsuarioController@verificacionDesesion']);
Route::get('/Usuario_Totales',['as'=>'usuario.index','uses'=>'UsuarioController@index']);
Route::get('/Usuario_Datos/{idcuenta}',['as'=>'usuario.show','uses'=>'UsuarioController@show']);
Route::post('/Usuario_actualizar_Datos',['as'=>'usuario.update','uses'=>'UsuarioController@update']);

/////////Rutas de Agenicas Turisticas
Route::get('/Agencia_totales',['as'=>'agencia.index','uses'=>'AgenciaController@index']);
Route::get('/Agencia_Datos/{idAgencia}',['as'=>'agencia.show','uses'=>'AgenciaController@show']);
Route::get('/Agencia_ubigeo/{idubigeo}',['as'=>'agencia.ubigeo','uses'=>'AgenciaController@buscarxUbigeo']);
Route::get('/Agencia_rating/{idRating}',['as'=>'agencia.rating','uses'=>'AgenciaController@buscarxRating']);

/////////ubigeo
Route::get('/departamento',['as'=>'ubigeo.index','uses'=>'UbigeoController@index']);
Route::get('/provincia/{idDepartamento}',['as'=>'ubigeo.show','uses'=>'UbigeoController@show']);
Route::get('/distrito/{idprovincia}',['as'=>'ubigeo.provincia','uses'=>'UbigeoController@provincia']);

///////paquetes turisticos




