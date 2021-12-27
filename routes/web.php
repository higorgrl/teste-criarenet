<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 'HomeController@index');
Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('/usuario')->group(function () {
    Route::get('/', 'UserController@index')->name('user');
    Route::get('/index', 'UserController@index')->name('user.index');
    Route::get('/deletados', 'UserController@deletados')->name('user.deletados');
    Route::get('/password/edit', 'UserController@passwordEdit')->name('user.password.edit')->whereNumber('user');
    Route::put('/password/update', 'UserController@passwordUpdate')->name('user.password.update')->whereNumber('user');
    Route::get('/edit/{user}', 'UserController@edit')->name('user.edit')->whereNumber('user');
    Route::put('/update/{roleUser}', 'UserController@update')->name('user.update')->whereNumber('roleUser');
    Route::post('/delete/{user}', 'UserController@delete')->name('user.delete')->whereNumber('user');
    Route::post('/restore/{user}', 'UserController@restore')->name('user.restore')->whereNumber('user');
});

Route::prefix('/perfil')->group(function () {
    Route::get('/', 'RoleController@index')->name('role');
    Route::get('/index', 'RoleController@index')->name('role.index');
    Route::get('/edit/{role}', 'RoleController@edit')->name('role.edit')->whereNumber('role');
    Route::put('/update/{role}', 'RoleController@update')->name('role.update')->whereNumber('role');
});

Route::prefix('/pessoa')->group(function () {
    Route::get('/', 'PessoaController@index')->name('pessoa');
    Route::get('/index', 'PessoaController@index')->name('pessoa.index');
    Route::get('/deletados', 'PessoaController@deletados')->name('pessoa.deletados');
    Route::get('/create', 'PessoaController@create')->name('pessoa.create');
    Route::post('/store', 'PessoaController@store')->name('pessoa.store');
    Route::get('/edit/{pessoa}', 'PessoaController@edit')->name('pessoa.edit')->whereNumber('pessoa');
    Route::put('/update/{pessoa}', 'PessoaController@update')->name('pessoa.update')->whereNumber('pessoa');
    Route::post('/delete/{pessoa}', 'PessoaController@delete')->name('pessoa.delete')->whereNumber('pessoa');
    Route::post('/restore/{pessoa}', 'PessoaController@restore')->name('pessoa.restore')->whereNumber('pessoa');
});
