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
Route::get('/', function () {
    return view('welcome');
});


Route::group(['middleware' => ['auth']], function(){

//cadastro de dados
Route::get('viewDados','PrincipalController@viewDados')->name('viewDados');
// envio de dados
Route::any('control','PrincipalController@envio')->name('control');
Route::get('verdados','PrincipalController@verdados')->name('verdados');

// atualizar contato
Route::get('{id}/editar', 'PrincipalController@editar')->name('editar');
Route::post('atualizar/{id}','PrincipalController@atualizar')->name('atualizar');

Route::get('deletar/{id}', 'PrincipalController@deletar')->name('deletar');
// excluir
Route::get('{id}/destroy', 'PrincipalController@destroy')->name('destroy');

});
Auth::routes();
