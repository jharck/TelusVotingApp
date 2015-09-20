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




Route::get('auth/login', [
    'uses' => 'AuthController@index',
    'as'   => 'auth_show_path',
]);
Route::post('auth/login', [
    'uses' => 'AuthController@store',
    'as'   => 'auth_store_path',
]);
Route::get('auth/logout', [
    'uses' => 'AuthController@destroy',
    'as'   => 'auth_destroy_path',
]);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [
        'uses' => 'HomeController@index',
        'as'   => 'home_path',
    ]);

    Route::get('committees/create', [
        'uses' => 'CommitteesController@create',
        'as'   => 'committee_create_path',
    ]);
    Route::post('committees/create', [
        'uses' => 'CommitteesController@store',
        'as'   => 'committee_store_path',
    ]);

    Route::get('committees/{id}/edit', [
        'uses' => 'CommitteesController@edit',
        'as'   => 'committee_edit_path',
    ])->where('id', '[0-9]+');

    Route::patch('committees/{id}/edit', [
        'uses' => 'CommitteesController@update',
        'as'   => 'committee_patch_path',
    ])->where('id', '[0-9]+');

    Route::delete('committees/{id}/edit', [
        'uses' => 'CommitteesController@destroy',
        'as'   => 'committee_delete_path',
    ])->where('id', '[0-9]+');

    Route::get('committees/{id}', [
        'uses' => 'CommitteesController@show',
        'as'   => 'committee_show_path',
    ])->where('id', '[0-9]+');
});

Route::group(['prefix' => 'service.php'], function () {
    Route::get('/', function () {
        return '';
    });
});
