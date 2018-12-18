<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|s
*/

Route::get('/', function () {
    return view('welcome');
});


Route::group([
	'prefix'	 => 'produtos',
	], 
	function(){
		Route::get('/pesquisar', 'ProdutoController@pesquisar');
		Route::post('/pesquisar', 'ProdutoController@pesquisar');
		Route::get('/inserir', 'ProdutoController@mostrar_inserir');
		Route::post('/inserir', 'ProdutoController@inserir');
		Route::get('/alterar/{id}', 'ProdutoController@mostrar_alterar');
		Route::post('/alterar', 'ProdutoController@alterar');
		Route::get('/excluir/{id}', 'ProdutoController@excluir');
	});
