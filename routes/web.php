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

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix'=>'back'], function(){
    Route::get('/','amployerController@index');
    Route::get('/employe/list',['uses'=>'amployerController@index','as'=>'employer-list']);
    Route::get('/employe/create',['uses'=>'amployerController@create' ]);
    Route::POST('/employe/store',['uses'=>'amployerController@store']);
    
    Route::get('/dep',['uses'=>'depController@index']);
    Route::get('/dep/create',['uses'=>'depController@create' ]);   
    Route::POST('/dep/store',['uses'=>'depController@store']);

    Route::get('/fichejr',['uses'=>'fichejrController@index' ,'as'=>'fiche-list']);
    Route::get('/fichejr/create',['uses'=>'fichejrController@create' ]);   
    Route::POST('/fichejr/store',['uses'=>'fichejrController@store']);
    

    Route::get('/fichevac',['uses'=>'fichevacController@index']);
    Route::get('/fichevac/create',['uses'=>'fichevacController@create' ]);  
    Route::get('/fichevac/planif',['uses'=>'fichevacController@planif']);   
    Route::POST('/fichevac/store/{id}',['uses'=>'fichevacController@store']);
    Route::Put('/vacance/statut/{id}',['uses'=>'fichevacController@statut']);
    Route::get('/vacance/listing',['uses'=>'fichevacController@listing', 'as'=>'listing-vacance']);
    
    Route::put('/presence/statut/{id}',['uses'=>'fichejrController@status']);
    Route::get('/presence/list',['uses'=>'fichejrController@index_hist']);

    Route::get('/permission/create',['uses'=>'admin\permissionController@create']);
    Route::post('/permission/store',['uses'=>'admin\permissionController@store']);

    Route::get('/role/create',['uses'=>'admin\roleController@create']);
    Route::post('/role/store',['uses'=>'admin\roleController@store']);
    Route::get('/dashboard',['uses'=>'dashBoardPageController@index']);
});


// Affiche les user
Route::get('/list-user', 'fichejrController@index');

// Gerer les historiques
Route::group(['prefix'=>'historique'], function(){
    Route::get('/','fichejrController@index_hist')->name('list_hist');
    Route::put('/record/{id}',['uses'=>'fichejrController@store','as'=>'record-hist']);
});