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

// Index
Route::get('/', function () {
    return view('master');
});

// Processos
Route::resource('/processos', 'ProcessoController');

// Autenticação Laravel
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Autenticação Senha Única USP
Route::get('login/senhaunica', 'Auth\LoginController@redirectToProvider');
Route::get('/callback', 'Auth\LoginController@handleProviderCallback');
