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


/** Rotas Site */
Route::get('empresa', 'Site\\SiteController@empresa');
Route::get('contato', 'Site\\SiteController@contato');
Route::get('/', 'Site\\SiteController@index');
Route::get('/home', 'Site\\SiteController@index');


Auth::routes();
/****************************************************************************************
 * Rotas do Painel
 ****************************************************************************************/
Route::group(['prefix' => 'painel', 'middleware' => 'auth'], function () {
    //Raiz painel
    Route::get('/', 'Painel\HomeController@index')->name('painelHome.index');
    //Usuários
    Route::any('/usuarios/pesquisar', 'Painel\UserController@search')->name('usuarios.search');
    Route::resource('/usuarios', 'Painel\UserController');
    //Categorias
    Route::any('/categorias/pesquisar', 'Painel\CategoryController@search')->name('categorias.search');
    Route::resource('/categorias', 'Painel\CategoryController');
    //Pots
    Route::any('/posts/pesquisar', 'Painel\PostController@search')->name('posts.search');
    Route::resource('/posts', 'Painel\PostController');
});
