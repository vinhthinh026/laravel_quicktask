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

Route::pattern('id', '([0-9]+)');
Route::pattern('name', '(.*)');

Route::get('/', function () {
    return view('welcome');
});

Route::namespace('Tasks')->middleware('auth')->group(function (){
    Route::get('/tasks',[
        'uses' => 'TasksController@getTasks',
        'as' => 'tasks.index',
    ])->middleware('localization');

    Route::post('/tasks',[
        'uses' => 'TasksController@postTasks',
        'as' => 'tasks.add',
    ])->middleware('localization');

    Route::get('/task{id}',[
        'uses' => 'TasksController@deleteTasks',
        'as' => 'tasks.delete',
    ])->middleware('localization');
});

Route::namespace('Lang')->group(function (){

    Route::post('/lang', [
        'as' => 'switchLang',
        'uses' => 'LangController@postLang',
    ])->middleware('localization');

});

Route::namespace('Login')->middleware('localization')->group(function (){

    Route::get('/login',[
        'uses' => 'LoginController@getLogin',
        'as' => 'login',
    ]);

    Route::post('/login',[
        'uses' => 'LoginController@postLogin',
        'as' => 'auth.login',
    ]);

    Route::get('logout',[
        'uses'=>'LoginController@logOut',
        'as'=>'auth.logout'
    ]);
});
