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

Route::get('/cards', 'CardsController@index')->name('cards.pri');

// criando card
Route::get('/cards/add', 'CardsController@add');
Route::post('/cards/add', 'CardsController@create');

// alterando card
Route::get('/cards/update/{id}', 'CardsController@edit');
Route::put('/cards/update/{id}', 'CardsController@update');

// alterando card
Route::delete('/cards/remove/{id}', 'CardsController@delete');

Route::get('/cards/search', 'CardsController@searchCard');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');







Route::group(['namespace' => 'Form'], function(){
    
    // Listando Users
    Route::get('/usuarios', 'TesteController@listAllUsers')->name('users.listAll');
    
    // Add Users
    Route::get('/usuarios/novo', 'TesteController@formAddUser')->name('users.formAddUser');
    Route::post('usuarios/create', 'TesteController@createUser')->name('users.create');
    
    Route::get('/usuarios/{user}', 'TesteController@listUser')->name('users.list');
    // Criando Users
    Route::get('/usuarios/edit/{user}', 'TesteController@formEditUser')->name('users.formEditUser');
    Route::put('usuarios/edit/{user}','TesteController@editUser')->name('users.edit');
    
    
    
    Route::delete('usuarios/destroy/{user}', 'TesteController@destroy')->name('user.destroy');
});